<template>
    <layout :colorBar="Bar" :movel="mobile" :elevacao="0" :Logo="logo">
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
                            style="font-family: 'Angkor', sans-serif;  margin: 0;
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
                :style="$page.props.events.length > 0 ? larguraHome >= 1024 ? 'min-height: 42vw;' : 'min-height: 500px;' : 'min-height: 300px;'"
                style="box-sizing: border-box; ">
                <div style="color: #3e6d0687; font-family: 'Angkor', sans-serif;" class="text-center text-h4  my-5">
                    Agenda
                </div>



                <v-toolbar class="px-2" color="transparent" style="z-index: 5;">
                    <v-text-field v-model="search" clearable density="comfortable" hide-details placeholder="Pequisar"
                        prepend-inner-icon="mdi-magnify" style="max-width: 300px;" variant="solo"></v-text-field>
                </v-toolbar>
                <div color="transparent" class="overflow-y-auto"
                    :style=" $page.props.events.length > 0 ? mobile === true ? 'height: 360px' : 'height: 540px;' : 'height: 200px;'">
                    <v-data-iterator v-if="$page.props.events.length > 0" :items="$page.props.events"
                        style="z-index: 2;" :items-per-page="3" :search="search">

                        <template v-slot:default="{ items }">
                            <v-container class="pa-2" fluid>
                                <v-row dense>
                                    <v-col v-for="item in items" :key="item.id" cols="auto" md="4">
                                        <v-card class="pb-3" height="370" color="#3e6d0687" border flat>
                                            <v-img cover aspect-ratio="4/3" max-height="250"
                                                :src="item.raw.banner"></v-img>

                                            <v-list-item class="mb-2" :subtitle="item.raw.descricao">
                                                <template v-slot:title>
                                                    <strong class="text-h6 mb-2">{{ item.raw.evento }}</strong>
                                                </template>
                                            </v-list-item>

                                            <div class="d-flex justify-space-between px-4">
                                                <div class="d-flex align-center  text-medium-emphasis me-1">
                                                    <v-icon icon="mdi-clock" start></v-icon>

                                                    <div class="text-truncate">{{ item.raw.horario }}</div>
                                                </div>

                                                <v-dialog transition="dialog-bottom-transition" width="auto">
                                                    <template v-slot:activator="{ props }">
                                                        <v-btn border flat size="small" v-bind="props" class="text-none"
                                                            text="Ver Evento">
                                                        </v-btn>

                                                    </template>
                                                    <template v-slot:default="{ isActive }">
                                                        <v-card rounded="3" style="max-width: 447px !important;">
                                                            <v-app-bar color="#284703" title="Evento"
                                                                style="position: fixed; top: 0; border-radius: 2px;"></v-app-bar>
                                                            <!-- <v-toolbar  style="" ></v-toolbar> -->
                                                            <v-img cover :src="item.raw.banner"></v-img>

                                                            <v-card-text>
                                                                <v-card-title>{{ item.raw.evento }}</v-card-title>
                                                                <v-card-subtitile style="font-weight: bold;">Descrição:
                                                                </v-card-subtitile>
                                                                {{ item.raw.descricao }}
                                                                <br />
                                                                <v-card-subtitile class="mt-7 d-flex align-baseline "
                                                                    style="font-weight: bold;">Horário: &nbsp<p
                                                                        class="mt-1" style="font-weight: 500;"> {{
        item.raw.horario }}
                                                                    </p> </v-card-subtitile>
                                                                <v-card-subtitile class="mt-7 d-flex align-baseline "
                                                                    style="font-weight: bold;">Data: &nbsp<p
                                                                        class="mt-1" style="font-weight: 500;">
                                                                        {{ formatData(item.raw.data) }}</p>
                                                                </v-card-subtitile>

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
                    <div v-else>
                        <v-container class="fill-height" fluid>
                            <v-row justify="center" align="center">
                                <v-col cols="12" sm="8" md="6">
                                    <v-alert type="info" border="left" class="text-green" color="#6ed16747" colored-border prominent>
                                        <v-row no-gutters align="center">
                                            <v-col class="grow">
                                                <div class="text-center">
                                                    Nenhum evento foi programado.
                                                </div>
                                            </v-col>
                                        </v-row>
                                    </v-alert>
                                </v-col>
                            </v-row>
                        </v-container>
                    </div>
                </div>




            </section>

            <section id="midia" class=" w-100">
                <div style="color: #3e6d0687; font-family: 'Angkor', sans-serif;" class="text-center text-h4  mb-2">
                    JOPE social
                </div>

                <v-card color="#6ed16747" rounded="0" class="w-100 h-100 d-flex justify-center pa-10"
                    style="box-sizing: border-box; position: relative;">
                    <div class="w-100 h-100 d-flex align-center justify-center" style="position: absolute; top: -10px;  background-color: rgb(171 171 171 / 19%);
    backdrop-filter: blur(10px); z-index: 5;">
                        <p
                            style="font-size: 40px; background-color: white; padding: 15px; border-radius: 8px; font-weight: 700;">
                            EM
                            BREVE</p>
                    </div>

                    <div class="w-100 h-100 d-flex flex-column align-end" style="position: relative;">
                        <div class=" pa-7"
                            style="border-left: 2px solid black; width: 90%; border-bottom: 2px solid black;">
                            <p class="" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Ultimas Postagens
                            </p>
                        </div>
                        <div class="w-100 " style="border: 2px solid black; border-top: none; min-height: 300px;">
                            <v-row class="pa-10">
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-black"
                                                icon="mdi-instagram"></v-icon> <v-card elevation="5" title="TITLE"
                                                class="w-75 bg-black h-75 text-center d-flex align-center justify-center rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-black"
                                                icon="mdi-instagram"></v-icon> <v-card elevation="5" title="TITLE"
                                                class="w-75 bg-black h-75 text-center d-flex align-center justify-center rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-black"
                                                icon="mdi-instagram"></v-icon> <v-card elevation="5" title="TITLE"
                                                class="w-75 bg-black h-75 text-center d-flex align-center justify-center rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <div class="w-100 " style="height: 330px;  border: 2px solid black;">
                                        <v-img class="w-100 " aspect-ratio="1/1" cover style="height: 82%;"
                                            src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"></v-img>
                                        <div class=" d-flex align-center"
                                            style=" height: 15%; width: 98%; margin: 5px auto; border: 2px solid black;">
                                            <v-icon size="x-large" class="mx-auto text-black"
                                                icon="mdi-instagram"></v-icon> <v-card elevation="5" title="TITLE"
                                                class="w-75 bg-black h-75 text-center d-flex align-center justify-center rounded mx-auto"></v-card>
                                        </div>
                                    </div>
                                </v-col>

                            </v-row>
                        </div>
                    </div>


                </v-card>

            </section>
            <section id="faq" class="w-100">
                <v-card color="#3e6d0687" rounded="0" class="w-100 h-100 d-flex flex-wrap justify-center align-center pa-10"
                    style="box-sizing: border-box;">

                    <div class="text-white  mx-8 py-5" :class="mobile === true ? 'w-100' : 'w-25'"
                        :style="mobile === true ? 'font-size: 30px !important;' : 'font-size: 67px !important;'" style="font-family: 'Abril Fatface', serif;  margin: 0;
                        font-weight: 600;
                        text-align: start;
                        line-height: 1.2;">
                        O QUE
                        MAIS
                        VOCÊ
                        PRECISA
                        SABER?
                    </div>
                    <div :class="mobile === true ? 'w-100 my-2 py-0' : 'w-50 my-5  py-9'" >
                        <v-expansion-panels class="my-1" variant="accordion">
                            <v-expansion-panel title="Como faço para fazer parte das Missões JOPE?"
                                class="bg-transparent text-white" elevation="0" rounded="0"
                                style="border: 1px solid white;" variant="outlined"
                                text="Para fazer parte da Missões JOPE, entre em contato com nosso lider Pr. Eliakim">
                            </v-expansion-panel>
                            <v-expansion-panel title="Qual é o endereço?" class="bg-transparent text-white"
                                elevation="0" rounded="0" style="border: 1px solid white;" variant="outlined" text="Nossas reuniões costuma ser em nossa igreja, localizada na Rua: Manoel Eudóxio Pereira, 1253 - Central. 
                                    Caso tenha algum evento diferente é so acessar a aba de eventos
                                ">
                            </v-expansion-panel>
                            <v-expansion-panel title="Com quantos anos posso fazer parte?"
                                class="bg-transparent text-white" elevation="0" rounded="0"
                                style="border: 1px solid white;" variant="outlined"
                                text="Para ingressar no JOPE Macapá é nescessário ter no minímo 15 anos. ">
                            </v-expansion-panel>
                            <v-expansion-panel title="Como posso fazer doações para a obra?"
                                class="bg-transparent text-white" elevation="0" rounded="0"
                                style="border: 1px solid white;" variant="outlined"
                                text="Para fazer doações para o JOPE, entre em contato com nosso lider Eliakim">
                            </v-expansion-panel>
                            <v-expansion-panel title="Como faço para entrar em um ministério?"
                                class="bg-transparent text-white" elevation="0" rounded="0"
                                style="border: 1px solid white;" variant="outlined"
                                text="Para ingressar em algum ministério é nescessário fazer parte do JOPE, entre em contato com os líderes de cada departamento. ">
                            </v-expansion-panel>
                            <v-expansion-panel title="Vou ser acompanhado e discipulado?"
                                class="bg-transparent text-white" elevation="0" rounded="0"
                                style="border: 1px solid white;" variant="outlined"
                                text="Claro! Nós do JOPE faremos o possível para que você se sinta acolhido, faremos seu acompanhamento e discipulado em nossas células">
                            </v-expansion-panel>
                        </v-expansion-panels>

                    </div>
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
        },
        formatData(data) {
            return data.split('-').reverse().join('/')
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