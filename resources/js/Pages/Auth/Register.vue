<template>
    <v-app>
        <v-layout class="h-screen d-flex" style="background-color: #284703ce;">
            <title>JOPE | Cadastre-se</title>
            <v-main class="d-flex">
                <v-card class="w-50 h-screen" color="#f3f1f1" style="position: relative;">
                    <div class="w-100 my-4 mx-3 d-flex">
                        <v-btn variant="plant" href="/login" color="#284703" style="position: absolute;"
                            icon="mdi-arrow-left">
                        </v-btn>
                        <div class="text-center w-100">
                            <img src="/public/img/Icon.png" class="text-center" style="width: 200px; height: 50px;" alt="">
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
                                <v-text-field label="Nome de usuário" v-model="username" variant="solo-filled"></v-text-field>
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
                                <v-text-field label="Senha" v-model="senha" variant="solo-filled"></v-text-field>
                            </v-col>
                            <v-col cols="6">
                                <v-text-field label=" Confirmar senha" v-model="confirm_senha"
                                    variant="solo-filled"></v-text-field>
                            </v-col>
                        </v-row>
                        <div class="w-100 d-flex">
                            <v-btn disabled="true" @click="cadastrar" class="ml-auto" color="gray">
                                Cadastrar
                            </v-btn>
                        </div>
                    </v-form>
                </v-card>
                <div class="w-50 h-screen overflow-y-auto">
                    <div class="w-100 h-screen " :class="pessoais === true ? 'bluranimation' : 'blur'" style=""> </div>
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
                                <label for="" class="text-white text-h6">Ah quanto tempo você é convertido?</label>
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
                                        label="Sim"></v-checkbox> <v-checkbox v-model="Fcelula" color="white" value="Não"
                                        label="Não"></v-checkbox> <v-checkbox v-model="Fcelula" color="white"
                                        value="As vezes" label="As vezes"></v-checkbox></div>
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
                                        theme="dark" class="text-white" value="As vezes" label="As vezes"></v-checkbox>
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
            </v-main>
        </v-layout>
    </v-app>
</template>
<style scoped>
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
        ministerio: null,
        batizado: null,
        celula: null,
        Fcelula: null,
        Vministerio: null,
        Tconvertido: null,
    }),
    watch: {
        // Observa todas as propriedades no objeto `data`
        nome(newValue, oldValue) {
            this.validarPessoais();
        },
        email(newValue, oldValue) {
            this.validarPessoais();
        },
        dataN(newValue, oldValue) {
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
        cadastrar(){
            const data = {
                nome: this.nome,
                username: this.username,
                data_nascimento: this.dataN,
                genero: this.genero,
                endereco: this.endereco,
                numero: this.numero,
                bairro: this.bairro,
                password: this.senha,
                convertido: this.convertido,
                ministerio: this.ministerio,
                batizado: this.batizado,
                celula: this.celula,
            }
            
        }
    }
}

</script>