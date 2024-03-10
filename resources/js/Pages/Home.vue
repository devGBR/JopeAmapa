<template>
    <layout :colorBar="Bar" :movel="mobile" :Logo="logo">
        <v-responsive>
            <div class="w-100">
                <video autoplay="true" muted="" loop="true" playsinline="" class="w-100 h-100" cover style="object-fit: contain;
    overflow-clip-margin: content-box;
    overflow: clip;" src="/public/projectjope.mp4"></video>
            </div>
            <section id="sobre" class="w-100 carousel" style="box-sizing: border-box;">
                <v-card class=" pa-10 w-100 h-100 text-justify " rounded="0" color="#3e6d0687" lines="three"
                    :height="mobile === true ? '400' : '200'">
                    <div class="d-flex justify-center align-center flex-wrap mx-auto">
                        <div class="text-white  mx-8" :class="mobile === true ? 'w-100' : 'w-25 my-5'"
                            :style="mobile === true ? 'font-size: 30px !important;' : 'font-size: 78px !important;'"
                            style="font-family: 'GrilledCheese BTN Toasted', sans-serif;  margin: 0;
                        font-weight: 600;
                        text-align: start;
                        line-height: 1.2;">
                            O que é o JOPE
                        </div>

                        <div :class="mobile === true ? 'w-100' : 'w-25'">
                            <v-card-text class=" w-100"
                                :style="mobile === true ? 'font-size: 0.8rem; !important;' : 'font-size: 1rem;  !important;'"
                                style="margin: 0;
                            
                            font-weight: 600;
                            line-height: 1.5;
                            color: white;">
                                JOPE e a sigla de Jovens Orando Pregando e Evangelizando
                            </v-card-text>
                            <v-card-text class="text-justify w-100 pt-0"
                                :style="mobile === true ? 'font-size: 0.8rem; !important;' : 'font-size: 1rem;  !important;'"
                                style="margin: 0;
                                
                                font-weight: 600;
                                line-height: 1.5;
                                color: white;
                                padding-block: 16px;">
                                Somos um grupo de jovens que buscamos acima de tudo o nosso SENHOR que habita em nos,
                                através de louvores, adorações, dinamicas, ações, teatro, confraternização e
                                etc...
                            </v-card-text>
                            <v-card-text class="w-100"
                                :style="mobile === true ? 'font-size: 0.8rem; !important;' : 'font-size: 1rem;  !important;'"
                                style="margin: 0;
                               
                                font-weight: 600;
                                line-height: 1.5;
                                color: white;
                                padding-block: 16px;">
                                Venha você tambem fazer parte desse JOPE!!!
                            </v-card-text>
                        </div>
                    </div>
                    <div class=" mx-auto d-flex align-center" v-if="$page.props.logger === false">
                        <v-btn href="/register" class="mx-auto" style="" color="#0a4">Inscrever-se agora</v-btn>
                    </div>
                </v-card>
            </section>


            <section id="eventos" class="w-100 my-8 carousel"
                :style="larguraHome >= 1024 ? 'min-height: 45vw;' : 'min-height: 500px;'"
                style="box-sizing: border-box; ">
                <div style="color: #3e6d0687; font-family: 'GrilledCheese BTN Toasted', sans-serif;"
                    class="text-center text-h4  my-5">
                    Agenda
                </div>



                <v-toolbar class="px-2" color="transparent" style="z-index: 5;">
                    <v-text-field v-model="search" clearable density="comfortable" hide-details placeholder="Pequisar"
                        prepend-inner-icon="mdi-magnify" style="max-width: 300px;" variant="solo"></v-text-field>
                </v-toolbar>
                <div color="transparent" class="overflow-y-auto"
                    :style="mobile === true ? 'height: 360px' : 'height: 500px;'">
                    <v-data-iterator :items="games" style="z-index: 2;" :items-per-page="3" :search="search">

                        <template v-slot:default="{ items }">
                            <v-container class="pa-2" fluid>
                                <v-row dense>
                                    <v-col v-for="item in items" :key="item.title" cols="auto" md="4">
                                        <v-card class="pb-3" color="#3e6d0687" border flat>
                                            <v-img :src="item.raw.img"></v-img>

                                            <v-list-item class="mb-2" :subtitle="item.raw.subtitle">
                                                <template v-slot:title>
                                                    <strong class="text-h6 mb-2">{{ item.raw.title }}</strong>
                                                </template>
                                            </v-list-item>

                                            <div class="d-flex justify-space-between px-4">
                                                <div class="d-flex align-center  text-medium-emphasis me-1">
                                                    <v-icon icon="mdi-clock" start></v-icon>

                                                    <div class="text-truncate">{{ item.raw.duration }}</div>
                                                </div>

                                                <v-dialog transition="dialog-bottom-transition" width="auto">
                                                    <template v-slot:activator="{ props }">
                                                        <v-btn border flat size="small" v-bind="props" class="text-none"
                                                            text="Ver Evento">
                                                        </v-btn>

                                                    </template>
                                                    <template v-slot:default="{ isActive }">
                                                        <v-card>
                                                            <v-toolbar color="#284703" title="Evento"></v-toolbar>
                                                            <v-img container height="" :src="item.raw.img"></v-img>

                                                            <v-card-text>
                                                                <v-card-title>{{ item.raw.title }}</v-card-title>
                                                                <v-card-subtitile style="font-weight: bold;">Descrição:
                                                                </v-card-subtitile>
                                                                {{ item.raw.subtitle }}
                                                                <br />
                                                                <v-card-subtitile class="mt-7 d-flex align-baseline "
                                                                    style="font-weight: bold;">Horário: &nbsp<p
                                                                        class="mt-1" style="font-weight: 500;"> 18:30
                                                                    </p> </v-card-subtitile>
                                                                <v-card-subtitile class="mt-7 d-flex align-baseline "
                                                                    style="font-weight: bold;">Data: &nbsp<p
                                                                        class="mt-1" style="font-weight: 500;">
                                                                        25/02/2024</p> </v-card-subtitile>

                                                            </v-card-text>

                                                            <v-card-actions class="justify-end">
                                                                <v-btn variant="text"
                                                                    @click="isActive.value = false">Fechar</v-btn>
                                                            </v-card-actions>
                                                        </v-card>
                                                    </template>
                                                </v-dialog>

                                            </div>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </template>

                        <template v-slot:footer="{ page, pageCount, prevPage, nextPage }">
                            <div class="d-flex align-center justify-center pa-4">
                                <v-btn :disabled="page === 1" icon="mdi-arrow-left" density="comfortable"
                                    variant="tonal" rounded @click="prevPage"></v-btn>

                                <div class="mx-2">
                                    Página {{ page }} de {{ pageCount }}
                                </div>

                                <v-btn :disabled="page >= pageCount" icon="mdi-arrow-right" density="comfortable"
                                    variant="tonal" rounded @click="nextPage"></v-btn>
                            </div>
                        </template>
                    </v-data-iterator>
                </div>




            </section>
            <section id="midia" class="h-100 w-100">
                <div style="color: #3e6d0687; font-family: 'GrilledCheese BTN Toasted', sans-serif;"
                    class="text-center text-h4  mb-2">
                    FAQ
                </div>
                <v-card color="#3e6d0687" rounded="0" class="w-100 h-100 d-flex justify-center pa-10"
                    style="box-sizing: border-box;">

                    <div class="text-white  mx-8 py-5" :class="mobile === true ? 'w-100' : 'w-25 my-5'"
                        :style="mobile === true ? 'font-size: 30px !important;' : 'font-size: 70px !important;'" style="font-family: 'Abril Fatface', serif;  margin: 0;
                        font-weight: 600;
                        text-align: start;
                        line-height: 1.2;">
                        O QUE
                        MAIS
                        VOCÊ
                        PRECISA
                        SABER?
                    </div>
                    <div class="w-50 my-5  py-9">
                        <v-expansion-panels class="my-1" variant="accordion">
                            <v-expansion-panel title="Como faço para fazer parte das Missões JOPE?" class="bg-transparent text-white" elevation="0" rounded="0" style="border: 1px solid white;" variant="outlined"
                                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima">
                            </v-expansion-panel>
                            <v-expansion-panel title="Title" class="bg-transparent text-white" elevation="0" rounded="0" style="border: 1px solid white;" variant="outlined"
                                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima">
                            </v-expansion-panel>
                            <v-expansion-panel title="Title" class="bg-transparent text-white" elevation="0" rounded="0" style="border: 1px solid white;" variant="outlined"
                                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima">
                            </v-expansion-panel>
                            <v-expansion-panel title="Title" class="bg-transparent text-white" elevation="0" rounded="0" style="border: 1px solid white;" variant="outlined"
                                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima">
                            </v-expansion-panel>
                            <v-expansion-panel title="Title" class="bg-transparent text-white" elevation="0" rounded="0" style="border: 1px solid white;" variant="outlined"
                                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima">
                            </v-expansion-panel>
                            <v-expansion-panel title="Title" class="bg-transparent text-white" elevation="0" rounded="0" style="border: 1px solid white;" variant="outlined"
                                text="Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, ratione debitis quis est labore voluptatibus! Eaque cupiditate minima">
                            </v-expansion-panel>
                        </v-expansion-panels>
                        
                    </div>
                    <!-- <div class="w-100 h-100 d-flex flex-column align-end" style="position: relative;">
                        <div class=" pa-7"
                            style="border-left: 2px solid black; width: 90%; border-bottom: 2px solid black;">
                            <p class="text-white" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Ultimas Postagens</p>
                        </div>
                        <div class="w-100 " style="border: 2px solid black; border-top: none; min-height: 300px;">
                            <v-row class="pa-10">
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-white" icon="mdi-instagram"></v-icon> <v-card elevation="5" class="w-75 bg-white h-75  rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-white" icon="mdi-instagram"></v-icon> <v-card elevation="5" class="w-75 bg-white h-75  rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-white" icon="mdi-instagram"></v-icon> <v-card elevation="5" class="w-75 bg-white h-75  rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-white" icon="mdi-instagram"></v-icon> <v-card elevation="5" class="w-75 bg-white h-75  rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>
                                
                            </v-row>
                        </div>
                    </div> -->


                </v-card>

            </section>
        </v-responsive>


    </layout>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
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
            logo: '/img/Icon.png',
            mobile: false,
            search: '',
            games: [
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/4.png',
                    title: 'The Sci-Fi Shooter Experience',
                    subtitle: 'Dive into a futuristic world of intense battles and alien encounters.',
                    advanced: false,
                    duration: '8 minutes',
                },
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/2.png',
                    title: 'Epic Adventures in Open Worlds',
                    subtitle: 'Embark on a journey through vast, immersive landscapes and quests.',
                    advanced: true,
                    duration: '10 minutes',
                },
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/3.png',
                    title: 'Surviving the Space Station Horror',
                    subtitle: 'Navigate a haunted space station in this chilling survival horror game.',
                    advanced: false,
                    duration: '9 minutes',
                },
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/5.png',
                    title: 'Neon-Lit High-Speed Racing Thrills',
                    subtitle: 'Experience adrenaline-pumping races in a futuristic, neon-soaked city.',
                    advanced: true,
                    duration: '12 minutes',
                },
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/6.png',
                    title: 'Retro-Style Platformer Adventures',
                    subtitle: 'Jump and dash through pixelated worlds in this classic-style platformer.',
                    advanced: false,
                    duration: '11 minutes',
                },
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/7.png',
                    title: 'Medieval Strategic War Campaigns',
                    subtitle: 'Lead armies into epic battles and conquer kingdoms in this strategic game.',
                    advanced: true,
                    duration: '10 minutes',
                },
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/1.png',
                    title: 'Underwater VR Exploration Adventure',
                    subtitle: 'Dive deep into the ocean and discover the mysteries of the underwater world.',
                    advanced: true,
                    duration: '11 minutes',
                },
                {
                    img: 'https://cdn.vuetifyjs.com/docs/images/graphics/games/8.png',
                    title: '1920s Mystery Detective Chronicles',
                    subtitle: 'Solve crimes and uncover secrets in the glamourous 1920s era.',
                    advanced: false,
                    duration: '9 minutes',
                },
            ],
        }
    },
    mounted() {

        console.log(this.$page.props.user)

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

        };

        this.larguraHome = window.innerWidth;
        if (this.larguraHome > 501) {
            window.addEventListener('scroll', this.scrollHandler);
        } else {
            this.Bar = '#284703';
            this.logo = '/img/IconBranca.png'
            this.mobile = true;
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