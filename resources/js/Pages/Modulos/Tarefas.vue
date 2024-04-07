<template>
    <Layout :colorBar="Bar" :movel="mobile" :elevacao="5" :class="!mobile ? 'mt-16' : ''" :Logo="logo">
        <span :class="toast" style="">
            <v-alert closable :title="title" class="w-100 h-100 text-white bg-white" :type="type">
                <v-alert-text class="text-black">{{ mensagem }}</v-alert-text>
            </v-alert>
        </span>
        <section class="">
            <div :class="!mobile ? 'px-16' : 'px-2'" class="my-5">
                <div class="d-flex">
                    <v-toolbar class="px-2 d-flex text-end" color="transparent" style="z-index: 5;">
                        <div class="ml-auto"
                            v-if="$page.props.lideranca[0] !== ''">
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
                        <section :class="!mobile && 'px-6'" class="d-flex h-screen flex-column">
                            <div class="h-50 ">
                                <v-card-title class="pt-0">Tarefas Responsável</v-card-title>
                                <v-card class="pa-5 pt-3" v-if="!mobile">
                                    <v-table height="270px" fixed-header>
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    TAREFA
                                                </th>
                                                <th class="text-center">
                                                    DEPARTAMENTO
                                                </th>
                                                <th class="text-center">
                                                    DATA FINAL
                                                </th>
                                                <th class="text-center">
                                                    DESCRIÇÃO
                                                </th>
                                                <th class="text-center">
                                                    STATUS
                                                </th>
                                                <th class="text-center">
                                                    EQUIPE
                                                </th>
                                                <th class="text-center">
                                                    AÇÕES
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in $page.props.minhastarefas" :key="item.name">

                                                <td class="text-center">{{ item.tarefa }}</td>
                                                <td class="text-center">{{ item.ministerio }}</td>
                                                <td class="text-center">{{item.vencimento.split('-').reverse().join('/') }}</td>
                                                <td class="text-center pa-0">
                                                    <v-tooltip location="top" :text="item.descricao">
                                                        <template v-slot:activator="{ props }">
                                                            <v-icon v-bind="props" color="green"
                                                                icon="mdi-information-variant-circle-outline">

                                                            </v-icon>
                                                        </template>
                                                    </v-tooltip>

                                                </td>
                                                <td class="text-center"><v-chip class="ma-2"
                                                        :color="item.status === 'Completo' ? 'green' : item.status === 'Em andamento' ? 'orange' : 'grey'"
                                                        text-color="white">
                                                        {{ item.status }}
                                                    </v-chip></td>

                                                <td class="text-center pa-0"><v-chip color="green" class="px-2 mx-1"
                                                        v-for="(user, index) in $page.props.userstaskresp[item.id]"
                                                        :key="index">
                                                        {{ user.username }}

                                                    </v-chip></td>
                                                <td class="text-center d-flex justify-center gap-1"><v-dialog
                                                        transition="dialog-bottom-transition" width="auto">
                                                        <template v-slot:activator="{ props: activatorProps }">
                                                            <v-btn v-bind="activatorProps" icon="mdi-eye" color="green"
                                                                variant="plain"></v-btn>
                                                        </template>

                                                        <template v-slot:default="{ isActive }"
                                                            style="position: relative;">
                                                            <v-btn color="#529606" dark class="text-white"
                                                                style="position: absolute; top: 0px; right: -10px; z-index: 5;"
                                                                icon="mdi-close" @click="isActive.value = false">
                                                            </v-btn>
                                                            <v-card class="mx-auto my-5"
                                                                style="width: auto; min-width: 364px; max-height: 400px; max-width: 400px; background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); color: white;">

                                                                <v-card-title class="justify-space-between">
                                                                    <div>
                                                                        <v-icon large
                                                                            left>mdi-briefcase-outline</v-icon>
                                                                        <span class="headline mx-2">Tarefa</span>
                                                                    </div>
                                                                    <v-chip class="ma-2"
                                                                        :color="item.status === 'Completo' ? 'green' : item.status === 'Em andamento' ? 'orange' : 'grey'"
                                                                        text-color="white">
                                                                        {{ item.status }}
                                                                    </v-chip>
                                                                </v-card-title>

                                                                <v-card-text>
                                                                    <div class="my-2 mt-0">
                                                                        <h3 class="text-h5 ">Descrição</h3>
                                                                        <p>{{ item.descricao }}</p>
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <h3 class="text-h5 ">Departamento</h3>
                                                                        <p>{{ item.ministerio }}</p>
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <h3 class="text-h5 ">Equipe</h3>
                                                                        <v-chip color="yellow" class="px-2 mx-1"
                                                                            v-for="(user, index) in $page.props.userstaskresp[item.id]"
                                                                            :key="index">
                                                                            {{ user.username }}
                                                                            <!-- Supondo que 'username' é um atributo dos usuários -->
                                                                        </v-chip>
                                                                    </div>
                                                                </v-card-text>

                                                                <div class="w-100 d-flex  pa-2 ">
                                                                    <div class="w-50 d-flex align-center">
                                                                        <div class="text-truncate d-flex align-center">
                                                                            <v-icon icon="mdi-calendar-multiselect"
                                                                                start></v-icon>
                                                                            <p>{{item.vencimento.split('-').reverse().join('/')}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div style="position: absolute; bottom: 10px; right: 10px; height: 95px;" class="d-flex justify-space-evenly flex-column">
                                                                        <v-btn color="grey" class="text-white"
                                                                        v-show="item.status !== 'Pendente'"
                                                                        @click="statusTask(item.id, 'Pendente'), isActive.value = false"
                                                                            prepend-icon="mdi-timer-sand-paused">
                                                                            Pendente
                                                                        </v-btn>
                                                                        <v-btn color="orange" class="text-white"
                                                                        v-show="item.status !== 'Em andamento'"
                                                                            @click="statusTask(item.id, 'Em andamento'), isActive.value = false"
                                                                            prepend-icon="mdi-timer-sand">
                                                                            Em andamento
                                                                        </v-btn>
                                                                        <v-btn color="#529606"
                                                                            v-show="item.status !== 'Completo'"
                                                                            @click="statusTask(item.id, 'Completo'), isActive.value = false"
                                                                            prepend-icon="mdi-timer-sand-complete">
                                                                            Completar
                                                                        </v-btn>
                                                                    </div>

                                                                </div>

                                                            </v-card>

                                                        </template>
                                                    </v-dialog>
                                                    <v-dialog transition="dialog-bottom-transition" width="auto">
                                                        <template v-slot:activator="{ props: activatorProps }">
                                                            <v-btn v-bind="activatorProps" icon="mdi-delete" color="red"
                                                                variant="plain"></v-btn>
                                                        </template>

                                                        <template v-slot:default="{ isActive }">
                                                            <v-card class="rounded-top">
                                                                <v-toolbar
                                                                    class="text-h3 pb-0 border-bottom border-secondary rounded-top text-white"
                                                                    color="#3e6d0687"
                                                                    title="Remover tarefa?"></v-toolbar>
                                                                <v-card-text class="mt-3 px-3">
                                                                    Isso irá excluir a tarefa permanentemente!
                                                                </v-card-text>
                                                                <v-card-actions>
                                                                    <v-spacer></v-spacer>
                                                                    <v-btn class="mx-auto ml-1" color="red"
                                                                        variant="plain" icon="mdi-cancel"
                                                                        @click="isActive.value = false">

                                                                    </v-btn>
                                                                    <v-btn class=" ml-2 d-flex" color="green"
                                                                        variant="plain" icon="mdi-check"
                                                                        @click="deleteTarefa(item.id)">

                                                                    </v-btn>
                                                                </v-card-actions>
                                                            </v-card>
                                                        </template>
                                                    </v-dialog>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </v-table>
                                </v-card>
                                <TableMobile :responsavel="true" :tarefas="$page.props.minhastarefas" :equipes="$page.props.userstaskresp"  v-else/>
                            </div>
                            <div class="h-50">
                                <v-card-title>Tarefas Mencionado(a)</v-card-title>
                                <v-card class="pa-5 pt-3" v-if="!mobile">
                                    <v-table height="270px" fixed-header>
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    TAREFA
                                                </th>
                                                <th class="text-center">
                                                    DEPARTAMENTO
                                                </th>
                                                <th class="text-center">
                                                    DATA FINAL
                                                </th>
                                                <th class="text-center">
                                                    DESCRIÇÃO
                                                </th>
                                                <th class="text-center">
                                                    STATUS
                                                </th>
                                                <th class="text-center">
                                                    EQUIPE
                                                </th>
                                                <th class="text-center">
                                                    AÇÕES
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in $page.props.tarefasgrupo" :key="item.name">
                                                <td class="text-center">{{ item.tarefa }}</td>
                                                <td class="text-center">{{ item.ministerio }}</td>
                                                <td class="text-center">{{
        item.vencimento.split('-').reverse().join('/') }}</td>
                                                <td class="text-center pa-0">
                                                    <v-tooltip location="top" :text="item.descricao">
                                                        <template v-slot:activator="{ props }">
                                                            <v-icon v-bind="props" color="green"
                                                                icon="mdi-information-variant-circle-outline">

                                                            </v-icon>
                                                        </template>
                                                    </v-tooltip>

                                                </td>
                                                <td class="text-center"><v-chip class="ma-2"
                                                        :color="item.status === 'Completo' ? 'green' : item.status === 'Em andamento' ? 'orange' : 'grey'"
                                                        text-color="white">
                                                        {{ item.status }}
                                                    </v-chip></td>

                                                <td class="text-center pa-0"><v-chip color="green" class="px-2 mx-1"
                                                        v-for="(user, index) in $page.props.userstaskgroup[item.id]"
                                                        :key="index">
                                                        {{ user.username }}
                                                        <!-- Supondo que 'username' é um atributo dos usuários -->
                                                    </v-chip></td>
                                                <td class="text-center d-flex justify-center gap-1">
                                                    <v-dialog transition="dialog-bottom-transition" width="auto">
                                                        <template v-slot:activator="{ props: activatorProps }">
                                                            <v-btn v-bind="activatorProps" icon="mdi-eye" color="green"
                                                                variant="plain"></v-btn>
                                                        </template>

                                                        <template v-slot:default="{ isActive }"
                                                            style="position: relative;">
                                                            <v-btn color="#529606" dark class="text-white"
                                                                style="position: absolute; top: 0px; right: -10px; z-index: 5;"
                                                                icon="mdi-close" @click="isActive.value = false">
                                                            </v-btn>
                                                            <v-card class="mx-auto my-5"
                                                                style="width: auto; min-width: 364px; max-width: 400px; background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); color: white;">

                                                                <v-card-title class="justify-space-between">
                                                                    <div>
                                                                        <v-icon large
                                                                            left>mdi-briefcase-outline</v-icon>
                                                                        <span class="headline mx-2">Tarefa</span>
                                                                    </div>
                                                                    <v-chip class="ma-2"
                                                                        :color="item.status === 'Completo' ? 'green' : item.status === 'Em andamento' ? 'orange' : 'grey'"
                                                                        text-color="white">
                                                                        {{ item.status }}
                                                                    </v-chip>
                                                                </v-card-title>

                                                                <v-card-text>
                                                                    <div class="my-2 mt-0">
                                                                        <h3 class="text-h5 ">Descrição</h3>
                                                                        <p>{{ item.descricao }}</p>
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <h3 class="text-h5 ">Departamento</h3>
                                                                        <p>{{ item.ministerio }}</p>
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <h3 class="text-h5 ">Equipe</h3>
                                                                        <v-chip color="yellow" class="px-2 mx-1"
                                                                            v-for="(user, index) in $page.props.userstaskgroup[item.id]"
                                                                            :key="index">
                                                                            {{ user.username }}
                                                                            <!-- Supondo que 'username' é um atributo dos usuários -->
                                                                        </v-chip>
                                                                    </div>
                                                                </v-card-text>

                                                                <div class="w-100 d-flex  pa-2 ">
                                                                    <div class="w-50 d-flex align-center">

                                                                    </div>
                                                                    <div class="w-50 d-flex justify-end">
                                                                        <div class="text-truncate d-flex align-center">
                                                                            <v-icon icon="mdi-calendar-multiselect"
                                                                                start></v-icon>
                                                                            <p>{{
        item.vencimento.split('-').reverse().join('/')
                                                                                }}
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </v-card>

                                                        </template>
                                                    </v-dialog>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </v-table>
                                </v-card>
                                <TableMobile :responsavel="false" :tarefas="$page.props.tarefasgrupo" :equipes="$page.props.userstaskgroup"  v-else/>
                            </div>
                        </section>
                    </v-window-item>

                    <v-window-item value="criar">
                        <v-card class="w-100 h-100 pa-8 my-5">
                            <v-card-title class="my-1 text-h4 mb-3">Nova Tarefa</v-card-title>
                            <form @submit.prevent="createEvent">
                                <v-text-field label="Tarefa" v-model="tarefa" color="#3e6d0687"
                                    variant="outlined"></v-text-field>
                                <v-text-field label="Data de vencimento" v-model="vencimento" color="#3e6d0687"
                                    type="date" variant="outlined"> </v-text-field>
                                <v-select label="Departamento" variant="outlined" v-model="ministerio"
                                    :items="departamentos"></v-select>
                                <v-select label="Responsável" v-model="responsavel" :items="users" item-title="nome"
                                    item-value="id" color="#3e6d0687" variant="outlined"></v-select>
                                <v-select label="Ajudantes" multiple v-model="ids_equipe" item-value="id" :items="users"
                                    item-title="nome" color="#3e6d0687" variant="outlined">
                                    <template v-slot:item="{ props, item }">
                                        <v-list-item v-bind="props" :subtitle="item.raw.cargo"></v-list-item>
                                    </template>
                                </v-select>
                                <v-select label="Status" variant="outlined" v-model="status"
                                    :items="['Pendente', 'Em andamento']"></v-select>
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
import TableMobile from '../../components/TableMobile.vue'
import { Inertia } from "@inertiajs/inertia"
export default {
    components: {
        Layout,
        TableMobile
    },
    data() {
        return {
            Bar: '#284703',
            logo: '/img/IconBranca.png',
            mobile: false,
            show: false,
            model: "ver",
            toast: 'notError',
            departamentos: [],
            mensagem: null,
            title: null,
            type: null,
            users: [],

            // Form 
            tarefa: null,
            vencimento: null,
            ministerio: null,
            responsavel: null,
            status: null,
            descricao: null,
            ids_equipe: null,
        }
    },
    watch: {
        responsavel() {
            if (this.ids_equipe !== null) {
                if (this.ids_equipe.includes(this.responsavel)) {
                    let index = this.ids_equipe.indexOf(this.responsavel);
                    if (index !== -1) {
                        this.ids_equipe.splice(index, 1);
                    }
                }
            }

        },
        ids_equipe() {
            if (this.responsavel !== null) {
                if (this.responsavel.includes(this.ids_equipe)) {
                    this.responsavel = null
                }
            }

        }
    },
    mounted() {
        if(this.$page.props.users){
            this.users = this.$page.props.users.data??null
        }
       
        this.departamentos = this.$page.props.cargos.includes('lider') ? ['instrumental', 'dança', 'louvor', 'teatro', 'dinamica', 'mídia'] : this.$page.props.lideranca
        this.larguraHome = window.innerWidth;
        if (this.larguraHome < 501) {
            this.Bar = '#284703';
            this.logo = '/img/IconBranca.png'
            this.mobile = true;
        }
    },
    methods: {
        createEvent() {
            if (this.tarefa !== null || this.vencimento !== null || this.responsavel !== null || this.descricao !== null || this.ids_equipe !== null || this.status !== null || this.ministerio !== null) {
                axios.post('/api/task-create', {

                    token: this.$page.props.user.token_api,
                    tarefa: this.tarefa,
                    vencimento: this.vencimento.split('/').reverse().join('-'),
                    responsavel: this.responsavel,
                    ids_equipe: this.ids_equipe,
                    status: this.status,
                    descricao: this.descricao,
                    ministerio: this.ministerio

                })
                    .then(
                        response => {
                            if (response.status === 200) {
                                this.title = "Tarefa"
                                this.mensagem = "Tarefa criada com sucesso"
                                this.type = "success"
                                this.toast = "cardtoast"
                                setTimeout(() => {
                                    window.location.href = '/tarefas'
                                }, 2000)
                            }
                        }
                    )
                    .catch(error => {
                        this.title = "Error ao criar tarefa"
                        this.mensagem = "Erro ao tentar criar a tarefa!"
                        this.type = "error"
                        this.toast = 'cardtoast';
                        setTimeout(() => {
                            this.toast = 'notError'
                        }, 3000)
                    })
            }
        },
        statusTask(id, status) {
            axios.post('/api/update-task', {
                token: this.$page.props.user.token_api,
                id: id,
                status: status
            }).then(
                response => {
                    if (response.status === 200) {
                        // Redirecionar para a página de login
                        this.title = "Status da Tarefa"
                        this.mensagem = "Status da tarefa alterada com sucesso"
                        this.type = "success"
                        this.toast = "cardtoast"
                        setTimeout(() => {
                            location.reload()
                        }, 2000)

                    }
                })
                .catch(error => {
                    this.title = "Error"
                    this.mensagem = "Erro ao tentar alterar o status da tarefa!"
                    this.type = "error"
                    this.toast = 'cardtoast';
                    setTimeout(() => {
                        this.toast = 'notError'
                    }, 3000)
                });
        },
        deleteTarefa(id) {
            axios.delete('/api/deletar-task', {
                data: {
                    token: this.$page.props.user.token_api,
                    id: id
                }
            }).then(
                response => {
                    if (response.status === 200) {
                        // Redirecionar para a página de login
                        this.title = "Deletado"
                        this.mensagem = "Tarefa deletada com sucesso"
                        this.type = "success"
                        this.toast = "cardtoast"
                        setTimeout(() => {
                            location.reload()
                        }, 2000)

                    }
                })
                .catch(error => {
                    this.title = "Error Delete"
                    this.mensagem = "Erro ao tentar deletar o tarefa!"
                    this.type = "error"
                    this.toast = 'cardtoast';
                    setTimeout(() => {
                        this.toast = 'notError'
                    }, 3000)
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
