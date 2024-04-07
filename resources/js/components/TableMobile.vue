<template>
    <section class="w-100 overflow-y-auto" style="max-height: 400px !important;">
        <v-card class="w-100 my-2 text-white" color="#5dc68a" v-for="item in tarefas">
            <v-card-title class="px-5 d-flex align-center">{{ item.tarefa }} 
                <div v-if="responsavel" class="w-100 text-end">
                <v-dialog
                        transition="dialog-bottom-transition" width="auto">
                        <template v-slot:activator="{ props: activatorProps }">
                            <v-btn v-bind="activatorProps" icon="mdi-delete" color="red" variant="tonal"></v-btn>
                        </template>

                        <template v-slot:default="{ isActive }">
                            <v-card class="rounded-top">
                                <v-toolbar class="text-h3 pb-0 border-bottom border-secondary rounded-top text-white"
                                    color="#3e6d0687" title="Remover tarefa?"></v-toolbar>
                                <v-card-text class="mt-3 px-3">
                                    Isso irá excluir a tarefa permanentemente!
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn class="mx-auto ml-1" color="red" variant="plain" icon="mdi-cancel"
                                        @click="isActive.value = false">

                                    </v-btn>
                                    <v-btn class=" ml-2 d-flex" color="green" variant="plain" icon="mdi-check"
                                        @click="deleteTarefa(item.id)">

                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </template>
                    </v-dialog>
                </div> 
            </v-card-title>
            <section class="w-100 overflow-y-auto py-2 d-flex flex-wrap px-1">
                <div class="w-50">
                    <div class="text-truncate d-flex align-baseline ml-7 flex-wrap"><v-icon icon="mdi-briefcase"
                            start></v-icon>Departamento</div>
                    <div class=" mt-1 text-center pl-6 w-75">
                        <p>{{ item.ministerio }}</p>
                    </div>
                </div>
                <div class="w-50">
                    <div class="text-truncate d-flex align-baseline justify-center flex-wrap"><v-icon
                            icon="mdi-list-status" start></v-icon>Status</div>
                    <div class="text-center mt-1 pl-6">
                        <v-chip class="ma-2"
                            :color="item.status === 'Completo' ? 'light-green-accent-3' : item.status === 'Em andamento' ? 'orange-accent-3' : 'blue-grey-darken-2'"
                            text-color="white">
                            {{ item.status }}
                        </v-chip>
                    </div>
                </div>
                <div class="w-50">
                    <div class="text-truncate d-flex align-baseline ml-8 flex-wrap"><v-icon icon="mdi-account-group"
                            start></v-icon>Equipe</div>

                    <div class=" mt-1 px-6">
                        <v-chip color="yellow" class="mx-auto" v-for="(user, index) in equipes[item.id]" :key="index">
                            {{ user.username }}
                        </v-chip>
                    </div>
                </div>
                <div class="w-50">
                    <div class="text-truncate d-flex align-baseline justify-center flex-wrap"><v-icon icon="mdi-clock"
                            start></v-icon>Data final</div>
                    <div class="text-center mt-1 pl-6">
                        <p>{{ item.vencimento.split('-').reverse().join('/') }}</p>
                    </div>
                </div>
                <div class="w-100 my-3">
                    <div class="text-truncate d-flex align-baseline flex-wrap px-7"><v-icon
                            icon="mdi-information-variant-circle-outline" start></v-icon>Descrição</div>
                    <div class="text-justify mt-1 px-5">
                        <p>{{ item.descricao }}</p>
                    </div>
                </div>
                <div class="w-100 text-center">

                    <v-dialog transition="dialog-bottom-transition" width="auto">
                        <template v-slot:activator="{ props: activatorProps }">
                            <v-btn prepend-icon="mdi-eye" v-bind="activatorProps" color="#48d1cc" class="text-white">
                                Visualizar
                            </v-btn>
                        </template>

                        <template v-slot:default="{ isActive }" style="position: relative;">
                            <v-btn color="#529606" dark class="text-white"
                                style="position: absolute; top: 0px; right: -10px; z-index: 5;" icon="mdi-close"
                                @click="isActive.value = false">
                            </v-btn>
                            <v-card class="mx-auto my-5"
                                style="width: auto; min-width: 364px; max-height: 400px; max-width: 400px; background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); color: white;">

                                <v-card-title class="justify-space-between">
                                    <div>
                                        <v-icon large left>mdi-briefcase-outline</v-icon>
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
                                            v-for="(user, index) in equipes[item.id]" :key="index">
                                            {{ user.username }}
                                            <!-- Supondo que 'username' é um atributo dos usuários -->
                                        </v-chip>
                                    </div>
                                </v-card-text>

                                <div class="w-100 d-flex  pa-2 ">
                                    <div class="w-50 d-flex align-center">
                                        <div class="text-truncate d-flex align-center">
                                            <v-icon icon="mdi-calendar-multiselect" start></v-icon>
                                            <p>{{ item.vencimento.split('-').reverse().join('/') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div v-if="responsavel" style="position: absolute; bottom: 10px; right: 10px; height: 95px;"
                                        class="d-flex justify-space-evenly flex-column">
                                        <v-btn color="grey" class="text-white" v-show="item.status !== 'Pendente'"
                                            @click="statusTask(item.id, 'Pendente'), isActive.value = false"
                                            prepend-icon="mdi-timer-sand-paused">
                                            Pendente
                                        </v-btn>
                                        <v-btn color="orange" class="text-white" v-show="item.status !== 'Em andamento'"
                                            @click="statusTask(item.id, 'Em andamento'), isActive.value = false"
                                            prepend-icon="mdi-timer-sand">
                                            Em andamento
                                        </v-btn>
                                        <v-btn color="#529606" v-show="item.status !== 'Completo'"
                                            @click="statusTask(item.id, 'Completo'), isActive.value = false"
                                            prepend-icon="mdi-timer-sand-complete">
                                            Completar
                                        </v-btn>
                                    </div>

                                </div>

                            </v-card>

                        </template>
                    </v-dialog>
                </div>
            </section>
        </v-card>
    </section>

</template>

<script>
import axios from 'axios'

export default {
    props: {
        equipes: Array,
        tarefas: Array,
        responsavel: Boolean
    },
    data: () => {

    },

    methods: {
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
    }
}

</script>

<style scoped></style>