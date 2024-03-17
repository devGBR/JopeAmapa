<template>
    <v-app>
        <v-layout class="h-screen d-flex" style="background-color: #284703ce;">
            <title>JOPE | Cadastre-se</title>
            <v-main class="d-flex">
                <span :class="incompleted" style="">
                    <v-alert closable title="DADOS INCOMPLETOS" class="w-100 h-100 text-orange" icon="mdi-alert-circle">
                        <v-alert-text class="text-black">Para se cadastrar por favor preencha todos os dados!</v-alert-text>
                    </v-alert>
                </span>
                <div class="w-100 d-flex flex-wrap overflow-y-auto">
                    <v-card class="h-screen card" color="#f3f1f1" style="position: relative;">

                        <div class="w-100 my-4 mx-3 d-flex">
                            <v-btn variant="plant" href="/login" color="#284703" style="position: absolute;"
                                icon="mdi-arrow-left">
                            </v-btn>
                            <div class="text-center w-100">
                                <img src="/public/img/Icon.png" class="text-center" style="width: 200px; height: 50px;"
                                    alt="">
                            </div>
                        </div>
                        <v-card-title class="text-center">
                            Dados Pessoais
                        </v-card-title>
                        <v-form class="mx-10 my-10">
                            <v-row>
                                <v-col cols="12">
                                    <v-text-field label="Nome" v-model="nome" variant="solo-filled"></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field label="Nome de usuário" v-model="username"
                                        variant="solo-filled"></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field label="Data de Nascimento" v-model="dataN"
                                        variant="solo-filled"></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-select label="Genero" v-model="genero" :items="['Masculino', 'Feminino']"
                                        variant="solo-filled"></v-select>
                                </v-col>
                                <v-col cols="4">
                                    <v-text-field label="Endereço" v-model="endereco" variant="solo-filled"></v-text-field>
                                </v-col>
                                <v-col cols="4">
                                    <v-text-field label="Numero" v-model="numero" variant="solo-filled"></v-text-field>
                                </v-col>
                                <v-col cols="4">
                                    <v-text-field label="Bairro" v-model="bairro" variant="solo-filled"></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field label="Senha" v-model="senha" type="password" variant="solo-filled"></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field label="Confirmar senha" type="password" v-model="confirm_senha"
                                        variant="solo-filled"></v-text-field>
                                </v-col>
                            </v-row>
                            <div class="w-100 d-flex">
                                <v-btn @click="cadastrar" class="ml-auto" color="green">
                                    Cadastrar
                                </v-btn>
                            </div>
                        </v-form>
                    </v-card>
                    <div style="" class="h-screen card overflow-y-auto">
                        <div class="w-100 h-screen  mobile" :class="pessoais === true ? 'bluranimation' : 'blur'" style=""> </div>
                        <div class="pt-1 mx-3 ">
                            <v-card-title class="text-center text-white mt-7">
                                Dados Complementares
                            </v-card-title>
                        </div>
                        <v-form class="mx-10 my-10">
                            <v-row>
                                <v-col cols="12">
                                    <label for="" class="text-white text-h6">Você e convertido?</label>
                                    <v-select label="" :items="['Sim', 'Não']" v-model="convertido"
                                        variant="solo-filled"></v-select>
                                </v-col>
                                <v-col v-if="convertido === 'Sim'" cols="12">
                                    <label for="" class="text-white text-h6">Há quanto tempo você é convertido?</label>
                                    <v-select label=""
                                        :items="['2 meses a 3 meses', '5 meses a 10 meses', '1 ano a 2 anos', '3 anos ou mais']"
                                        v-model="Tconvertido" variant="solo-filled"></v-select>
                                </v-col>
                                <v-col v-if="convertido != 'Não'" cols="12">
                                    <label for="" class="text-white text-h6">Você é batizado nas águas?</label>
                                    <v-select label="" :items="['Sim', 'Não']" v-model="batizado"
                                        variant="solo-filled"></v-select>
                                </v-col>
                                <v-col cols="12">
                                    <label for="" class="text-white text-h6">Você frequenta alguma célula da Luz para os
                                        povos?</label>
                                    <div class="d-flex"><v-checkbox v-model="Fcelula" color="white" value="Sim"
                                            label="Sim"></v-checkbox> <v-checkbox v-model="Fcelula" color="white"
                                            value="Não" label="Não"></v-checkbox> <v-checkbox v-model="Fcelula"
                                            color="white" value="As vezes" label="Às vezes"></v-checkbox></div>
                                </v-col>
                                <v-col v-if="Fcelula != 'Não'" cols="12">
                                    <label for="" class="text-white text-h6">Qual célula?</label>
                                    <v-select label=""
                                        :items="['Tenda do encontro', 'Célula FJO - Joiane', 'Star com Deus - Marco zero', 'Emanuel', 'Aliança com Deus - Tia Graça']"
                                        v-model="celula" variant="solo-filled"></v-select>
                                </v-col>
                                <v-col cols="12">
                                    <label for="" class="text-white text-h6">Tem vontade de participar ou participa de algum
                                        ministerio ?</label>
                                    <div class="d-flex"> <v-checkbox v-model="Vministerio" color="white" theme="dark"
                                            class="text-white" value="Sim" label="Sim"></v-checkbox> <v-checkbox
                                            v-model="Vministerio" color="white" theme="dark" class="text-white" value="Não"
                                            label="Não"></v-checkbox> <v-checkbox v-model="Vministerio" color="white"
                                            theme="dark" class="text-white" value="As vezes" label="Às vezes"></v-checkbox>
                                    </div>
                                </v-col>
                                <v-col v-if="Vministerio != 'Não'" cols="12">
                                    <label for="" class="text-white text-h6">Qual ministerio?</label>
                                    <v-select label=""
                                        :items="['Instrumental', 'Dança', 'Louvor', 'Teatro', 'Dinamica', 'Midia - Audiovisual', 'Servo']"
                                        v-model="ministerio" variant="solo-filled"></v-select>
                                </v-col>

                            </v-row>

                        </v-form>
                    </div>
                </div>
            </v-main>
        </v-layout>
    </v-app>
</template>
<style scoped>
.notIncompleted {
    display: none;
}

.incompleted {
    position: absolute;
    z-index: 9;
    right: -800px;
    width: 350px;
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

.blur {
    position: absolute;
    background-color: rgb(171 171 171 / 19%);
    backdrop-filter: blur(3px);
    z-index: 2;
    top: 0px;
}

.bluranimation {
    position: absolute;
    background-color: rgb(171 171 171 / 19%);
    backdrop-filter: blur(3px);
    z-index: 2;
    top: 0px;
    animation: outside 1s ease-out forwards;
}
.card{
    width: 50% !important;
}

@media only screen and (max-width: 768px){
 .card{
    width: 100% !important;
 }
 .mobile{
    display: none;
 }

}

@keyframes outside {
    50% {
        right: 0px;
    }

    90% {
        right: -50%;
    }

    100% {
        right: -100%;
        display: none;
    }
}
</style>
<script>
import { Inertia } from '@inertiajs/inertia'
import axios from 'axios'
export default {
    data: () => ({
        nome: null,
        username: null,
        dataN: null,
        genero: null,
        endereco: null,
        numero: null,
        bairro: null,
        senha: null,
        confirm_senha: null,
        pessoais: false,
        convertido: null,
        ministerio: 'Nenhum',
        batizado: null,
        celula: 'Nenhuma',
        Fcelula: null,
        Vministerio: null,
        Tconvertido: null,
        incompleted: 'notIncompleted',
    }),
    watch: {
        // Observa todas as propriedades no objeto `data`
        nome(newValue, oldValue) {
            this.validarPessoais();
        },
        email(newValue, oldValue) {
            this.validarPessoais();
        },
        dataN(newdate, olddate) {
            if (newdate.length === 2) {
                this.dataN = newdate + '/'
            }
            if (newdate.length === 5) {
                this.dataN = newdate + '/'
            }
            if (olddate != null && olddate.length > 9) {
                this.dataN = newdate.substring(0, 10)
            }
            this.validarPessoais();
        },
        genero(newValue, oldValue) {
            this.validarPessoais();
        },
        endereco(newValue, oldValue) {
            this.validarPessoais();
        },
        numero(newValue, oldValue) {
            this.validarPessoais();
        },
        bairro(newValue, oldValue) {
            this.validarPessoais();
        },
        senha(newValue, oldValue) {
            if (this.senha.length >= 8) {
                this.validarPessoais();
            }
        },
        confirm_senha(newValue, oldValue) {
            if (this.confirm_senha.length >= 8) {
                this.validarPessoais();
            }

        }

    },
    methods: {
        validarPessoais() {
            // Verifica se todos os campos não são `null`
            if (
                this.nome !== null &&
                this.email !== null &&
                this.dataN !== null &&
                this.genero !== null &&
                this.endereco !== null &&
                this.numero !== null &&
                this.bairro !== null &&
                this.senha !== null &&
                this.confirm_senha !== null &&
                this.senha === this.confirm_senha
            ) {
                this.pessoais = true;
            } else {
                this.pessoais = false;
            }
        },
        cadastrar() {
            const data = {
                nome: this.nome,
                username: this.username,
                data_nascimento: this.dataN.split('/').reverse().join("-"),
                genero: this.genero,
                endereco: this.endereco,
                numero: this.numero,
                bairro: this.bairro,
                password: this.senha,
                convertido: this.Tconvertido,
                ministerio: this.ministerio,
                batizado: this.batizado === 'Sim' ? true : false,
                celula: this.celula,
            }
            let validador = Object.values(data).some(valor => valor === null || valor === undefined || valor === '');
            if (validador) {
                this.incompleted = 'incompleted'
            } else {
                axios.post('api/registrar', data).then(response => {
                    if (response.status === 200) {
                        // Redirecionar para a página de login
                        window.location.href = '/login';
                    }
                })
                    .catch(error => {
                        // Tratar erros
                        console.error('Erro:', error);
                    });
            }

        }
    }
}

</script>