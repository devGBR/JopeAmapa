<template>
    <Layout :colorBar="Bar" :movel="mobile" :elevacao="5" :class="!mobile ? 'mt-16' : ''" :Logo="logo">
        <span :class="toast" style="">
            <v-alert closable :title="title" class="w-100 h-100 text-white bg-white" :type="type">
                <v-alert-text class="text-black">{{ mensagem }}</v-alert-text>
            </v-alert>
        </span>
        <section class="">
            <div class="px-16 my-5">
                <div class="d-flex">
                    <v-toolbar class="px-2 d-flex text-end" color="transparent" style="z-index: 5;">
                        <!-- <v-text-field v-model="search" clearable density="comfortable" hide-details
                            placeholder="Pequisar" prepend-inner-icon="mdi-magnify" style="max-width: 300px;"
                            variant="solo"></v-text-field> -->
                        <div class="ml-auto"
                            v-if="$page.props.cargos.includes('mídia') || $page.props.cargos.includes('lider')">
                            <v-btn color="green" class="ml-auto" v-if="model === 'ver'" prepend-icon="mdi-plus"
                                @click=" model = 'criar'" variant="outlined">Criar
                                Tarefa</v-btn>
                            <v-btn color="green" class="ml-auto" v-else prepend-icon="mdi-arrow-left"
                                @click=" model = 'ver'" variant="outlined">Voltar</v-btn>
                        </div>

                    </v-toolbar>

                </div>
                <v-window v-model="model">
                    <v-window-item value="ver">

                    </v-window-item>

                    <v-window-item value="criar">
                        <v-card class="w-100 h-100 pa-8 my-5">
                            <v-card-title class="my-1 text-h4 mb-3">Nova Tarefa</v-card-title>
                            <form @submit.prevent="createEvent">
                                <v-text-field label="Tarefa" v-model="nome" color="#3e6d0687"
                                    variant="outlined"></v-text-field>
                                <v-text-field label="Data de vencimento" v-model="vencimento" color="#3e6d0687"
                                    type="date" variant="outlined"> </v-text-field>
                                <v-select label="Responsável" v-model="responsavel" :items="users" item-title="nome" item-value="id" color="#3e6d0687"
                                    variant="outlined"></v-select>
                                <v-select label="Ajudantes" multiple v-model="ids_equipe" item-value="id" :items="users"
                                    item-title="nome" color="#3e6d0687" variant="outlined">
                                    <template v-slot:item="{ props, item }">
                                        <v-list-item v-bind="props" :subtitle="item.raw.cargo"></v-list-item>
                                    </template>
                                </v-select>
                                <v-select label="Status" variant="outlined"
                                    :items="['Pendente', 'Completa', 'Em andamento']"></v-select>
                                <v-textarea label="Descrição da tarefa" v-model="descricao" color="#3e6d0687"
                                    variant="outlined"></v-textarea>

                                <v-btn class="me-4" variant="outlined" color="green" append-icon="mdi-send"
                                    type="submit">
                                    Criar
                                </v-btn>
                            </form>
                        </v-card>
                    </v-window-item>
                </v-window>


            </div>
        </section>
    </Layout>
</template>

<script>
import axios from 'axios';
import Layout from '../../Layout/Layout.vue'
import { Inertia } from "@inertiajs/inertia"
export default {
    components: {
        Layout,

    },
    data() {
        return {
            Bar: '#284703',
            logo: '/img/IconBranca.png',
            mobile: false,
            show: false,
            model: "ver",
            toast: 'notError',
            mensagem: null,
            title: null,
            type: null,
            users: [],

            // Form 
            nome: null,
            vencimento: null,
            responsavel: null,
            descricao: null,
            ids_equipe: null,
        }
    },
    watch: {
        responsavel(){
            console.log(this.responsavel);
        },
        ids_equipe(){
            console.log(this.ids_equipe);
        }
    },
    mounted() {
        this.users = this.$page.props.users.data
        console.log(this.$page.props.users.data)
        this.larguraHome = window.innerWidth;
        if (this.larguraHome < 501) {
            this.Bar = '#284703';
            this.logo = '/img/IconBranca.png'
            this.mobile = true;
        }
    },
    methods: {
        createEvent() {
            if (this.nome !== null || this.data !== null || this.horario !== null || this.descricao !== null || this.banner !== null) {
                const data = {
                    nome: this.nome,
                    data: this.data,
                    horario: this.horario,
                    descricao: this.descricao,
                    banner: this.banner,
                }
                Inertia.post('events', data)
            }
        },
        deleteEvent(id) {
            axios.delete('/api/deletar-event', {
                data: {
                    token: this.$page.props.user.token_api,
                    id: id
                }
            }).then(
                response => {
                    if (response.status === 200) {
                        // Redirecionar para a página de login
                        this.title = "Deletado"
                        this.mensagem = "Evento deletado com sucesso"
                        this.type = "success"
                        this.toast = "cardtoast"
                        setTimeout(() => {
                            location.reload()
                        }, 2000)

                    } else if (response.status === 500) {
                        this.title = "Error Delete"
                        this.mensagem = "Erro ao tentar deletar o evento!"
                        this.type = "error"
                        this.toast = 'cardtoast';
                    }
                })
                .catch(error => {
                    this.title = "Error Delete"
                    this.mensagem = 'Ops tivemos um erro';
                    this.type = "error"
                    this.toast = 'cardtoast';
                });
        },
        formatData(data) {
            return data.split('-').reverse().join('/')
        }
    }
}

</script>

<style scoped>
.notError {
    display: none;
}

.cardtoast {
    position: fixed;
    z-index: 9;
    width: 350px;
    right: -800px;
    animation: toast 8s ease-in;
}

@keyframes toast {
    10% {
        opacity: 0.5;
        right: 0px;
    }

    11% {
        opacity: 1;
    }

    99% {
        opacity: 0.5;
    }

    100% {
        opacity: 0;
        right: 0;
    }
}
</style>
