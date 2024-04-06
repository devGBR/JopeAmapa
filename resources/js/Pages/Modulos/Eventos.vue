<template>
    <Layout :colorBar="Bar" :movel="mobile" :elevacao="5" :class="!mobile ? 'mt-16' : ''" :Logo="logo">
        <span :class="toast" style="">
            <v-alert closable :title="title" class="w-100 h-100 text-white bg-white" :type="type">
                <v-alert-text class="text-black">{{ mensagem }}</v-alert-text>
            </v-alert>
        </span>
        <section class="">
            <div :class="mobile ? 'px-2 my-5' : 'px-16 my-5'">
                <div class="d-flex">
                    <v-toolbar class="px-2 d-flex text-end" color="transparent" style="z-index: 5;">
                        <!-- <v-text-field v-model="search" clearable density="comfortable" hide-details
                            placeholder="Pequisar" prepend-inner-icon="mdi-magnify" style="max-width: 300px;"
                            variant="solo"></v-text-field> -->
                        <div class="ml-auto"
                            v-if="$page.props.cargos.includes('mídia') || $page.props.cargos.includes('lider')">
                            <v-btn color="green" class="ml-auto" v-if="model === 'ver'" prepend-icon="mdi-plus"
                                @click=" model = 'criar'" variant="outlined">Criar
                                Evento</v-btn>
                            <v-btn color="green" class="ml-auto" v-else prepend-icon="mdi-arrow-left"
                                @click=" model = 'ver'" variant="outlined">Voltar</v-btn>
                        </div>

                    </v-toolbar>

                </div>
                <v-window v-model="model">
                    <v-window-item value="ver">
                        <v-card class="mx-auto w-100 text-white pa-5 my-3" :class="!mobile && 'pr-0'"
                            v-for="event in $page.props.events.data" :key="event.index" color="#3e6d0687">
                            <div :class="mobile ? 'd-flex flex-wrap' : 'd-flex'">
                                <v-img height="180px" :class="mobile ? 'w-100 rounded' : 'w-25 rounded'"
                                    :src="event.banner" cover></v-img>

                                <v-card-title :class="mobile ? 'w-100 px-2' : 'px-8 w-75'"
                                    class=" py-5  d-flex flex-column flex-wrap justify-space-between">
                                    <div class="w-100 d-flex">
                                        <div class="w-75">
                                            {{ event.evento }}
                                            <v-card-subtitle>

                                            </v-card-subtitle>
                                        </div>
                                        <div class="w-50 text-end"
                                            v-if="$page.props.cargos.includes('mídia') || $page.props.cargos.includes('lider')">

                                            <v-btn prepend-icon="mdi-delete" class="" @click="deleteEvent(event.id)"
                                                color="red">
                                                Excluir
                                            </v-btn>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap w-100 mt-2" style="box-sizing: border-box;">
                                        <div class="d-flex align-center w-50 me-1 justify-space-between"
                                            style="padding: 0px 190px 0px 0px;">
                                            <div class="d-flex flex-column">


                                                <div class="text-truncate"><v-icon icon="mdi-clock"
                                                        start></v-icon>{{ mobile ?  event.horario : 'Horario' }}</div>
                                                <div class="pl-10" v-if="!mobile">
                                                    <p>{{ event.horario }}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mx-10">
                                                <div class="text-truncate"><v-icon icon="mdi-calendar-multiselect"
                                                        start></v-icon> {{ mobile ?  formatData(event.data) : 'Data' }}</div>
                                                <div class="pl-10" v-if="!mobile">
                                                    <p>{{ formatData(event.data) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <v-card-actions class="text-end w-100" style="position: relative;">
                                            <v-spacer></v-spacer>
                                            <v-btn :icon="show ? 'mdi-chevron-up' : 'mdi-chevron-down'"
                                                @click="show = !show"
                                                style="position: absolute; bottom: -20px; right: 0px;"></v-btn>
                                        </v-card-actions>
                                    </div>

                                </v-card-title>
                            </div>

                            <v-expand-transition class="mt-5">
                                <div v-show="show">
                                    <v-divider></v-divider>

                                    <v-card-text>
                                        {{ event.descricao }}
                                    </v-card-text>
                                </div>
                            </v-expand-transition>
                        </v-card>
                    </v-window-item>

                    <v-window-item value="criar">
                        <v-card class="w-100 h-100 pa-8 my-5">
                            <form @submit.prevent="createEvent">
                                <v-text-field label="Nome do Evento" v-model="nome" color="#3e6d0687"
                                    variant="outlined"></v-text-field>
                                <v-text-field label="Data do Evento" v-model="data" color="#3e6d0687" type="date"
                                    variant="outlined"> </v-text-field>
                                <v-text-field label="Horario do Evento" v-model="horario" type="time" color="#3e6d0687"
                                    variant="outlined"></v-text-field>
                                <v-textarea label="Descrição do Evento" v-model="descricao" color="#3e6d0687"
                                    variant="outlined"></v-textarea>
                                <v-file-input label="Flyer do Evento" v-model="banner" color="#3e6d0687"
                                    prepend-icon="mdi-camera" variant="outlined"></v-file-input>
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
            nome: null,
            data: null,
            toast: 'notError',
            mensagem: null,
            title: null,
            type: null,
            horario: null,
            descricao: null,
            banner: null,
        }
    },
    mounted() {
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
