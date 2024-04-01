<template>
    <Layout :colorBar="Bar" :movel="mobile" :elevacao="5" :class="!mobile ? 'mt-16' : ''" :Logo="logo">
        <span :class="toast" style="">
            <v-alert closable :title="title" class="w-100 h-100 text-white bg-white" :type="type">
                <v-alert-text class="text-black">{{ mensagem }}</v-alert-text>
            </v-alert>
        </span>
        <section class="w-100 mt-5" :style="`max-width: ${larguraHome}px;`">
            <v-row>
                <v-col cols="12" class="" md="12">
                    <v-row class="w-100 h-75 py-1">
                        <v-col cols="12" class="py-5" md="3">
                            <v-card title="Jovens cadastrados" elevation="10" class="w-100 mx-3 text-white"
                                style="background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); position: relative;"
                                :height="'270'">
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-face-woman</v-icon>Mulheres</p>
                                    <span style="font-size: 2rem; position: relative; left: 25%;">{{ qtdMA }}</span>
                                </div>
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-face-man</v-icon>Homens</p>
                                    <span style="font-size: 2.5rem; position: relative; left: 25%;">{{ qtdMO }}</span>
                                </div>
                                <div class="w-100">
                                    <p
                                        style="font-weight: 600; position: absolute; bottom: 20px; left: 5%; font-size: 1.5rem;">
                                        TOTAL</p> <span
                                        style="font-size: 7.5rem; font-weight: 400; text-shadow: 0 0 0.2em #000; position: absolute; bottom: -15px; right: 35px;">{{
        qtdJovens }}</span>
                                </div>


                            </v-card>
                        </v-col>
                        <v-col cols="12" class="py-5" md="6">

                            <v-card title="Convertidos" color="#3e6d06" :height="mobile ? '520' : '270'"
                                class="w-100 mx-3" style="position: relative;">
                                <div class="h-100 w-100 " style="position: absolute; top: 0;">
                                    <DoughnutComp :dados="dados" :mobile="mobile" />

                                </div>

                            </v-card>
                        </v-col>
                        <v-col cols="12" class="py-5" md="3">
                            <v-card title="Batizados" elevation="10" class="w-100 mx-3 text-white"
                                style="background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); position: relative;"
                                :height="'270'">
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-face-woman</v-icon>Mulheres</p>
                                    <span style="font-size: 2rem; position: relative; left: 25%;">{{ mulheresBatizadas
                                        }}</span>
                                </div>
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-face-man</v-icon>Homens</p>
                                    <span style="font-size: 2.5rem; position: relative; left: 25%;">{{ homensBatizados
                                        }}</span>
                                </div>
                                <div class="w-100">
                                    <p
                                        style="font-weight: 600; position: absolute; bottom: 20px; left: 5%; font-size: 1.5rem;">
                                        TOTAL</p> <span
                                        style="font-size: 7.5rem; font-weight: 400; text-shadow: 0 0 0.2em #000; position: absolute; bottom: -15px; right: 35px;">{{
        batizados }}</span>
                                </div>


                            </v-card>
                        </v-col>
                        <v-col cols="12" class="py-5" md="6">

                            <v-card title="Celula" color="#3e6d06" :height="mobile ? '580' : '270'" class="w-100 mx-3"
                                style="position: relative;">
                                <div class="h-100 w-100 " style="position: absolute; top: 0;">
                                    <Celula :dados="dados" />

                                </div>

                            </v-card>
                        </v-col>
                        <v-col cols="12" class="py-5" md="3">
                            <v-card title="Faixa de idade" elevation="10" class="w-100 mx-3 text-white"
                                style="background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); position: relative;"
                                :height="'270'">
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-baby</v-icon>Menores de 18</p>
                                    <span style="font-size: 2rem; position: relative; left: 25%;">{{ Menordeidade
                                        }}</span>
                                </div>
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-hiking</v-icon>Maiores de 18</p>
                                    <span style="font-size: 2.5rem; position: relative; left: 25%;">{{ Maiordeidade
                                        }}</span>
                                </div>
                                <div v-if="Maiordeidade" class="h-75" style=" width: 40%;   position: absolute;
    bottom: 10px;
    right: 20px;">
                                    <BarHorizontal :maior="Maiordeidade" :menor="Menordeidade" />
                                </div>


                            </v-card>
                        </v-col>
                        <v-col cols="12" class="py-5" md="3">
                            <v-card title="Não batizados" elevation="10" class="w-100 mx-3 text-white"
                                style="background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); position: relative;"
                                :height="'270'">
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-face-woman</v-icon>Mulheres</p>
                                    <span style="font-size: 2rem; position: relative; left: 25%;">{{ mulheresNBatizadas
                                        }}</span>
                                </div>
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-face-man</v-icon>Homens</p>
                                    <span style="font-size: 2.5rem; position: relative; left: 25%;">{{ homensNBatizados
                                        }}</span>
                                </div>
                                <div class="w-100">
                                    <p
                                        style="font-weight: 600; position: absolute; bottom: 20px; left: 5%; font-size: 1.5rem;">
                                        TOTAL</p> <span
                                        style="font-size: 7.5rem; font-weight: 400; text-shadow: 0 0 0.2em #000; position: absolute; bottom: -15px; right: 35px;">{{
        Nbatizado }}</span>
                                </div>


                            </v-card>
                        </v-col>

                        <v-col cols="12" :class="!mobile ? 'pb-10' : ''">
                            <v-card class="w-100 mx-3 pa-2 " height="700"
                                style="background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); position: relative;">
                                <!-- <v-toolbar class="px-2" color="transparent" style="z-index: 5;">
                                    <v-text-field v-model="search" clearable density="comfortable" hide-details
                                        placeholder="Pequisar" prepend-inner-icon="mdi-magnify"
                                        style="max-width: 300px;" variant="solo"></v-text-field>
                                </v-toolbar> -->
                                <v-table height="600px" class="my-auto" fixed-header>
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th class="text-center">
                                                Nome
                                            </th>
                                            <th class="text-center">
                                                Username
                                            </th>
                                            <th class="text-center">
                                                Idade
                                            </th>
                                            <th class="text-center">
                                                Departamentos
                                            </th>
                                            <th class="text-center">
                                                Endereço
                                            </th>
                                            <th class="text-center">
                                                Bairro
                                            </th>
                                            <th class="text-center">
                                                Batizado
                                            </th>
                                            <th class="text-center">
                                                Celula
                                            </th>
                                            <th class="text-center">
                                                Interesse
                                            </th>
                                            <th class="text-center">
                                                Ações
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in users" :key="item.name">
                                            <td class="text-center">{{ item.nome }}</td>
                                            <td class="text-center">{{ item.username }}</td>
                                            <td class="text-center">{{ item.data_nascimento ?
        calcDate(item.data_nascimento) : "Idade não informada!" }}</td>
                                            <td class="text-center">{{ item.cargo.split("|").join(' | ') }}</td>
                                            <td class="text-center">{{ item.endereco + ', ' + item.numero }}</td>
                                            <td class="text-center">{{ item.bairro }}</td>
                                            <td class="text-center">{{ item.batizado ? 'Sim' : 'Não' }}</td>
                                            <td class="text-center">{{ item.celula }}</td>
                                            <td class="text-center">{{ item.ministerio }}</td>
                                            <td class="text-center d-flex">
                                                <v-dialog transition="dialog-bottom-transition" width="auto">
                                                    <template v-slot:activator="{ props: activatorProps }">
                                                        <v-btn v-bind="activatorProps" @click="insertDataI(item)"
                                                            icon="mdi-pencil" variant="plain"></v-btn>
                                                    </template>

                                                    <template v-slot:default="{ isActive }" style="position: relative;">
                                                        <v-btn color="#529606" dark class="text-white"
                                                            style="position: absolute; top: 0px; right: -10px; z-index: 5;"
                                                            icon="mdi-close" @click="isActive.value = false">
                                                        </v-btn>
                                                        <v-card class="mx-auto my-5"
                                                            style="max-width: 600px; min-width: 364px; box-sizing: border-box;  background: linear-gradient(to right, rgb(27 48 2), #4c8705fc); box-shadow: darkgreen -5px -5px 13px 0px; color: white;">

                                                            <v-card-title class="justify-space-between">
                                                                <div>
                                                                    <v-icon large left>mdi-pencil</v-icon>
                                                                    <span class="headline mx-2">Editar</span>
                                                                </div>
                                                            </v-card-title>

                                                            <v-row class="px-5 mt-1">
                                                                <v-col cols="12" class="py-0">
                                                                    <v-text-field label="Nome" v-model="nome" disabled
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" md="6" class="py-0">
                                                                    <v-text-field label="Nome de usuário"
                                                                        v-model="username" disabled
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" md="6" class="py-0">
                                                                    <v-text-field label="Data de Nascimento"
                                                                        v-model="dataN" disabled
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" class="py-0">
                                                                    <v-select multiple label="Departamentos"
                                                                        v-model="ministerio" :items="deparments"
                                                                        item-title="name" item-value="value"
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" class="py-0">
                                                                    <v-select multiple
                                                                        label="Liderança de Departamentos"
                                                                        v-model="lideranca" :items="deparments"
                                                                        item-title="name" item-value="value"
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" md="5" class="py-0">
                                                                    <v-text-field label="Endereço" v-model="endereco"
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" md="3" class="py-0">
                                                                    <v-text-field label="Numero" v-model="numero"
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" md="4" class="py-0 ">
                                                                    <v-text-field label="Bairro" v-model="bairro"
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" md="6" class="py-0">
                                                                    <v-select label="Batizado" :items="['Sim', 'Não']"
                                                                        v-model="batizado" variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" md="6" class="py-0">
                                                                    <v-select
                                                                        :items="['2 meses a 3 meses', '5 meses a 10 meses', '1 ano a 2 anos', '3 anos ou mais']"
                                                                        v-model="Tconvertido"
                                                                        label="Tempo de convertido"
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                                <v-col cols="12" class="py-0">
                                                                    <v-select
                                                                        :items="['Tenda do encontro', 'Célula FJO - Joiane', 'Star com Deus - Marco zero', 'Emanuel', 'Aliança com Deus - Tia Graça']"
                                                                        v-model="celula" label="Celula"
                                                                        variant="solo-filled" />
                                                                </v-col>
                                                            </v-row>

                                                            <div class="w-100 d-flex  pa-2 ">
                                                                <div class="w-50 d-flex align-center">

                                                                </div>
                                                                <div class="w-50 d-flex justify-end">
                                                                    <v-btn append-icon="mdi-send"
                                                                        @click="edit(item.id), isActive.value = false"
                                                                        color="#529606">
                                                                        Editar
                                                                    </v-btn>
                                                                </div>

                                                            </div>

                                                        </v-card>

                                                    </template>
                                                </v-dialog>
                                                <v-dialog transition="dialog-bottom-transition" width="auto">
                                                    <template v-slot:activator="{ props: activatorProps }">
                                                        <v-btn v-bind="activatorProps" icon="mdi-delete" color=""
                                                            variant="plain"></v-btn>
                                                    </template>

                                                    <template v-slot:default="{ isActive }">
                                                        <v-card class="rounded-top">
                                                            <v-toolbar
                                                                class="text-h3 pb-0 border-bottom border-secondary rounded-top text-white"
                                                                color="#3e6d0687" title="Remover Usuário?"></v-toolbar>
                                                            <v-card-text class="mt-3 px-3">
                                                                Isso irá excluir o usuário permanentemente!
                                                            </v-card-text>
                                                            <v-card-actions>
                                                                <v-spacer></v-spacer>
                                                                <v-btn class="mx-auto ml-1" color="red" variant="plain"
                                                                    icon="mdi-cancel" @click="isActive.value = false">

                                                                </v-btn>
                                                                <v-btn class=" ml-2 d-flex" color="green"
                                                                    variant="plain" icon="mdi-check"
                                                                    @click="deleteUser(item.id), isActive.value = false">

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

                        </v-col>
                    </v-row>
                </v-col>
            </v-row>


        </section>
    </Layout>
</template>

<script>
import Layout from '../../Layout/Layout.vue';
import DoughnutComp from '../../components/Convertidos.vue'
import Celula from '../../components/Celula.vue'
import BarHorizontal from '../../components/BarHorizontal.vue'
import moment from "moment"
import axios from "axios"

export default {
    components: {
        Layout,
        DoughnutComp,
        BarHorizontal,
        Celula,
    },
    data() {
        return {
            Bar: '#284703',
            logo: '/img/IconBranca.png',
            mobile: false,
            deparments: [
                {
                    name: 'Instrumental',
                    value: 'instrumental'
                }, {
                    name: 'Dança',
                    value: 'dança'
                }, {
                    name: 'Louvor',
                    value: 'louvor'
                }, {
                    name: 'Teatro',
                    value: 'teatro'
                }, {
                    name: 'Dinamica',
                    value: 'dinamica'
                }, {
                    name: 'Mídia - Audiovisual',
                    value: 'mídia'
                }, {
                    name: 'Liderança',
                    value: 'lider'
                }
            ],
            toast: 'notError',
            mensagem: null,
            title: null,
            type: null,
            larguraHome: null,
            jovens: this.$page.props.users.data,
            dados: this.$page.props.dados.data,
            users: [],
            qtdJovens: this.$page.props.users.data.length,
            batizados: 0,
            homensBatizados: 0,
            mulheresBatizadas: 0,
            Nbatizado: 0,
            homensNBatizados: 0,
            mulheresNBatizadas: 0,
            qtdMO: null,
            qtdMA: null,
            Menordeidade: 0,
            Maiordeidade: 0,


            // VARIAVEIS EDIT
            nome: null,
            username: null,
            dataN: null,
            ministerio: [],
            endereco: null,
            numero: null,
            bairro: null,
            batizado: null,
            celula: 'null',
            Tconvertido: "Não convertido",
            lideranca: null,


        }
    },
    mounted() {
        this.jovens.forEach(usuario => {
            let complementar = this.dados.find(complementar => complementar.user_id === usuario.id);
            this.users.push({ ...usuario, ...complementar });
        });
        this.quantidade()
        this.larguraHome = window.innerWidth;
        if (this.larguraHome < 501) {
            this.Bar = '#284703';
            this.logo = '/img/IconBranca.png'
            this.mobile = true;
        }
    },
    methods: {
        deleteUser(id) {
            axios.delete('/api/deletar-user', {
                data: {
                    token: this.$page.props.user.token_api,
                    id: id
                }
            }).then(
                response => {
                    if (response.status === 200) {
                        // Redirecionar para a página de login
                        this.title = "Deletado"
                        this.mensagem = "Usuário deletado com sucesso"
                        this.type = "success"
                        this.toast = "cardtoast"
                        setTimeout(() => {
                            location.reload()
                        }, 2000)

                    } else if (response.status === 500) {
                        this.title = "Error Delete"
                        this.mensagem = "Erro ao tentar deletar o usuário!"
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
        edit(id) {
            axios.put("/api/edituser", {

                token: this.$page.props.user.token_api,
                user: id,
                endereco: this.endereco,
                bairro: this.bairro,
                numero: this.numero,
                ministerio: this.ministerio,
                batizado: this.batizado === 'Sim' ? '1' : '0',
                celula: this.celula,
                convertido: this.Tconvertido,
                lideranca: this.lideranca

            })
                .then(
                    response => {
                        if (response.status === 200) {
                            this.title = "Sucesso"
                            this.mensagem = "Dados do usuário editado com sucesso"
                            this.type = "success"
                            this.toast = "cardtoast"
                            // console.log(this.toast)
                            setTimeout(() => {
                                window.location.href = '/dashboard'
                            }, 2000)
                        }
                    }
                )
                .catch(error => {
                    this.title = "Error ao editar usuário"
                    this.mensagem = "Erro ao tentar editar o usuário!"
                    this.type = "error"
                    this.toast = 'cardtoast';
                    setTimeout(() => {
                        this.toast = 'notError'
                    }, 3000)
                })
        },

        insertDataI(user) {
            if (user) {
                this.nome = user.nome;
                this.username = user.username;
                this.dataN = moment(user.data_nascimento).format('DD/MM/YYYY');
                this.ministerio = user.cargo.split("|");
                this.endereco = user.endereco;
                this.numero = user.numero;
                this.bairro = user.bairro;
                this.batizado = user.batizado ? 'Sim' : 'Não';
                this.celula = user.celula;
                this.Tconvertido = user.convertido;
                this.lideranca = user.lider_ministerio ? user.lider_ministerio.split('|') : null
            }
        },
        calcDate(date) {
            return moment().format("YYYY") - moment(date).format("YYYY")
        },
        quantidade() {
            this.qtdMA = this.$page.props.users.data.filter(user => user.genero == "Feminino").length
            this.qtdMO = this.$page.props.users.data.filter(user => user.genero == "Masculino").length
            this.batizados = this.$page.props.dados.data.filter(user => user.batizado == 1).length
            this.homensBatizados = this.$page.props.dados.data.filter(dado => {
                const user = this.$page.props.users.data.find(user => user.id === dado.user_id);
                return user && user.genero === 'Masculino' && dado.batizado === 1;
            }).length;

            this.mulheresBatizadas = this.$page.props.dados.data.filter(dado => {
                const user = this.$page.props.users.data.find(user => user.id === dado.user_id);
                return user && user.genero === 'Feminino' && dado.batizado === 1;
            }).length;
            this.Nbatizado = this.$page.props.dados.data.filter(user => user.batizado == 0).length
            this.homensNBatizados = this.$page.props.dados.data.filter(dado => {
                const user = this.$page.props.users.data.find(user => user.id === dado.user_id);
                return user && user.genero === 'Masculino' && dado.batizado === 0;
            }).length;

            this.mulheresNBatizadas = this.$page.props.dados.data.filter(dado => {
                const user = this.$page.props.users.data.find(user => user.id === dado.user_id);
                return user && user.genero === 'Feminino' && dado.batizado === 0;
            }).length;

            this.Menordeidade = this.$page.props.users.data.filter(user => moment().format('YYYY') - moment(user.data_nascimento).format('YYYY') <= 18).length
            this.Maiordeidade = this.$page.props.users.data.filter(user => moment().format('YYYY') - moment(user.data_nascimento).format('YYYY') > 18).length
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
    z-index: 30;
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