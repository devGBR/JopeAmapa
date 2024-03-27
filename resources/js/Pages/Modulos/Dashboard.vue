<template>
    <Layout :colorBar="Bar" :movel="mobile" :elevacao="5" :class="!mobile ? 'mt-16' : ''" :Logo="logo">
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
                        <v-col cols="12" class="py-5" md="3">

                            <v-card :height="'270'" title="Convertidos" color="#3e6d06" class="w-100 mx-3"
                                style="position: relative;">
                                <div class="h-100 d-flex w-100 " style="position: absolute; top: 0;">
                                    <DoughnutComp :dados="dados" />

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
                                    <span style="font-size: 2rem; position: relative; left: 25%;">{{ mulheresBatizadas }}</span>
                                </div>
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-face-man</v-icon>Homens</p>
                                    <span style="font-size: 2.5rem; position: relative; left: 25%;">{{ homensBatizados }}</span>
                                </div>
                                <div class="w-100">
                                    <p
                                        style="font-weight: 600; position: absolute; bottom: 20px; left: 5%; font-size: 1.5rem;">
                                        TOTAL</p> <span
                                        style="font-size: 7.5rem; font-weight: 400; text-shadow: 0 0 0.2em #000; position: absolute; bottom: -15px; right: 35px;">{{
                                        batizado }}</span>
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
                                    <span style="font-size: 2rem; position: relative; left: 25%;">{{ Menordeidade }}</span>
                                </div>
                                <div class="mx-5" style="width: auto;">
                                    <p style="font-weight: 700;" class="d-flex align-baseline"> <v-icon
                                            class="mr-2">mdi-hiking</v-icon>Maiores de 18</p>
                                    <span style="font-size: 2.5rem; position: relative; left: 25%;">{{ Maiordeidade }}</span>
                                </div>
                                <div class="h-75" style=" width: 40%;   position: absolute;
    bottom: 10px;
    right: 20px;">
                                  <BarHorizontal :maior="Maiordeidade" :menor="Menordeidade" />
                                </div>


                            </v-card>
                        </v-col>
                        <v-col cols="12" class="py-5" md="6">

                            <v-card :height="'270'" class="w-100 d-flex align-center justify-center mx-3"
                                style="position: relative;">

                            </v-card>
                        </v-col>

                        <v-col cols="12" :class="!mobile ? 'pb-10' : ''">
                            <v-card class="w-100 mx-3">


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
import DoughnutComp from '../../components/DounghnutComp.vue'
import BarHorizontal from '../../components/BarHorizontal.vue'
import moment from "moment"

export default {
    components: {
        Layout,
        DoughnutComp,
        BarHorizontal,
    },
    data() {
        return {
            Bar: '#284703',
            logo: '/img/IconBranca.png',
            mobile: false,
            larguraHome: null,
            jovens: this.$page.props.users,
            dados: this.$page.props.dados,
            qtdJovens: this.$page.props.users.length,
            batizado: 0,
            homensBatizados: 0,
            mulheresBatizadas : 0,
            qtdMO: null,
            qtdMA: null,
            Menordeidade: 0,
            Maiordeidade: 0,

        }
    },
    mounted() {
        console.log(this.qtdJovens)
        this.quantidade()
        this.larguraHome = window.innerWidth;
        if (this.larguraHome < 501) {
            this.Bar = '#284703';
            this.logo = '/img/IconBranca.png'
            this.mobile = true;
        }
    },
    methods: {
        quantidade() {
            this.qtdMA = this.$page.props.users.filter(user => user.genero == "Feminino").length
            this.qtdMO = this.$page.props.users.filter(user => user.genero == "Masculino").length
            this.batizado = this.$page.props.dados.filter(user => user.batizado == 1).length
            this.homensBatizados = this.$page.props.dados.filter(dado => {
                const user = this.$page.props.users.find(user => user.id === dado.user_id);
                return user && user.genero === 'Masculino' && dado.batizado === 1;
            }).length;
            this.Menordeidade = this.$page.props.users.filter(user => moment().format('YYYY') - moment(user.data_nascimento).format('YYYY') <= 18).length
            this.Maiordeidade = this.$page.props.users.filter(user => moment().format('YYYY') - moment(user.data_nascimento).format('YYYY') > 18).length
            this.mulheresBatizadas = this.$page.props.dados.filter(dado => {
                const user = this.$page.props.users.find(user => user.id === dado.user_id);
                return user && user.genero === 'Feminino' && dado.batizado === 1;
            }).length;
        }
    }
}
</script>

<style scoped></style>