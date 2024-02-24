<template>
    <layout :colorBar="Bar" :Logo="logo">
        <v-responsive>
            <div class="w-100">
                <v-carousel class="carousel" hide-delimiters progress="green">
                    <div style="position: absolute; z-index: 40;" class="w-100">
                        <p class="text-center text-white mt-16"
                            style="font-size: 29px; font-family: 'Cedarville Cursive', cursive;">
                            Eventos</p>
                    </div>
                    <a href="#eventos">
                        <v-carousel-item class="bg-white">
                            <v-sheet :color="randomcolor" height="100%">
                                <v-img height="450" src="eventos/culto-jope-24-02-24.png"></v-img>
                            </v-sheet>

                        </v-carousel-item>
                    </a>

                </v-carousel>
            </div>
            <section class="w-100 my-8 carousel" style="box-sizing: border-box;">
                <div class="text-center text-h4 text-white my-5">
                    O que é o JOPE
                </div>

                <v-card class="mx-3  pa-10 text-justify" height="200"
                    title="JOPE e a sigla de Jovens Orando Pregando e Evangelizando "
                    text="Somos um grupo de jovens que buscamos acima de tudo o nosso SENHOR que habita em nos, através de louvores, adorações, dinamicas, ações, teatro, confraternização e etc...">
                    <v-card-text> Venha você tambem fazer parte desse JOPE!!!</v-card-text>

                </v-card>
            </section>


            <section class="w-100 my-8 px-3 carousel" style="box-sizing: border-box;">
                <div class="text-center text-h4 text-white my-5">
                    Agenda
                </div>
                <v-card class="w-100 my-4 mt-16">
                    <v-card-title>Semana JOPE</v-card-title>
                    <v-table>
                        <thead>
                            <tr>
                                <th style="width: 10px !important;">Horarios</th>
                                <th class="text-center">
                                    Segunda
                                </th>
                                <th class="text-center">
                                    Terça
                                </th>
                                <th class="text-center">
                                    Quarta
                                </th>
                                <th class="text-center">
                                    Quinta
                                </th>
                                <th class="text-center">
                                    Sexta
                                </th>
                                <th class="text-center">
                                    Sábado
                                </th>
                                <th class="text-center">
                                    Domingo
                                </th>
                            </tr>
                        </thead>
                        <tbody id="eventos">
                            <tr>
                                <td>16:00</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                            </tr>
                            <tr>
                                <td>17:00</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                            </tr>
                            <tr>
                                <td>18:30</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center"><v-tooltip location="bottom" text="TEMA: PENIEL">
                                        <template v-slot:activator="{ props }">
                                            <v-chip color="green" v-bind="props">CULTO JOPE</v-chip>
                                        </template>
                                    </v-tooltip></td>
                                <td class="text-center">Nenhum Evento</td>
                            </tr>
                            <tr>
                                <td>19:30</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                                <td class="text-center">Nenhum Evento</td>
                            </tr>
                        </tbody>
                    </v-table>

                </v-card>
            </section>

        </v-responsive>


    </layout>
</template>
<script>
import Layout from '../Layout/Layout.vue'

export default {
    components: {
        Layout
    },
    data() {
        return {
            Bar: 'transparent',
            img: null,
            imglargura: null,
            altura: null,
            randomcolor: '#999',
            logo: '/img/Icon.png'
        }
    },
    mounted() {
        // Crie um novo objeto Image
        this.img = new Image();

        // Guarde uma referência ao componente Vue
        var self = this;

        // Defina o atributo src como o caminho da imagem
        this.img.src = "eventos/culto-jope-24-02-24.png";

        // Aguarde o carregamento completo da imagem
        this.img.onload = function () {
            // Acesse as propriedades naturalWidth e naturalHeight para obter as dimensões originais da imagem
            this.imglargura = self.img.naturalWidth;
            this.altura = self.img.naturalHeight;

            console.log('Largura da imagem:', this.imglargura);
            console.log('Altura da imagem:', this.altura);
        };

        this.larguraHome = window.innerWidth;
        if (this.larguraHome > 501) {
            window.addEventListener('scroll', this.scrollHandler);
        } else {
            this.Bar = '#284703';
        }
    },
    methods: {
        scrollHandler() {
            if (window.scrollY > 0) {
                this.Bar = '#284703'; // Defina a cor desejada quando o scroll for maior que 0
                this.logo = '/img/IconBranca.png'
            } else {
                this.Bar = 'transparent'; // Defina a cor inicial quando o scroll for igual a 0
                this.logo = '/img/Icon.png'
            }
        }
    },
    beforeDestroy() {
        window.removeEventListener('scroll', this.scrollHandler);
    }
}
</script>

<style>
.carousel {
    max-height: 0;
    overflow: hidden;
    /* Para esconder o conteúdo enquanto a animação não estiver completa */
    animation: openPage 1s ease-in-out forwards;
    position: relative;
    /* Adiciona isso para permitir animar a posição */
    top: -400px;
    /* Inicia o carrossel acima da sua posição final */
}

@keyframes openPage {
    0% {
        max-height: 0;
        /* Começa com altura zero */
        top: -400px;
        /* Começa acima da tela */
    }

    100% {
        max-height: 450px;
        /* Termina com altura máxima */
        top: 0;
        /* Desce até a posição final */
    }
}
</style>