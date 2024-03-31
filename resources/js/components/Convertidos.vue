<template>
    <div class="w-100 h-100 d-flex flex-wrap">
    <div style="width: 270px; height: 270px;" :class="mobile ? 'mt-8 mx-auto' : 'mx-auto'" >
        <Doughnut :data="data" :options="options" ref="chart" />
    </div>
    
    <div :class="mobile ? 'w-100' : 'w-50 my-auto'" class=" px-3 ml-auto">
        <v-table class="pa-2 rounded" density="compact">
            <thead>
                <tr>
                    <th class="text-left">Período de Conversão</th>
                    <th class="text-left">Quantidade</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="(value, key, index) in maior" :key="index">
                    <td>{{ key }}</td>
                    <td class="text-center">{{ value }}</td>
                </tr>
            </tbody>
        </v-table>
    </div>
    </div>
   
</template>
<script>

import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, BarElement, CategoryScale, LinearScale, ArcElement } from 'chart.js'
import { Doughnut } from 'vue-chartjs'

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, PointElement, LineElement, Legend, ArcElement)

export default {
    props: {
        dados: Array,
    },
    components: {
        Doughnut,
    },
    data() {
        return {
            maior: {},
            mobile:  window.innerWidth < 501 ? true : false,
            data: {
                labels: ['2 a 3 meses', '5 a 10 meses', '1 a 2 anos', '3 anos ou mais'],
                datasets: [
                    {
                        label: 'Dataset 1',
                        data: this.calculo(),
                        backgroundColor: ['#DD1B16', '#FFA726', 'yellow', '#41B883'],
                    }
                ]
            },

            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: this.position(),
                        align: 'center',
                        labels: {
                            color: '#fff' // cor da legenda
                        }
                    },
                    title: {
                        display: false,
                        text: 'Chart.js Doughnut Chart',
                        color: 'white'
                    }
                }
            },
        }
    },
    mounted() {
        this.calculo()
    },

    methods: {
        position(){
            this.mobile = window.innerWidth < 501 ? true : false
            return this.mobile ? 'bottom' : 'left'
        },
        calculo() {
            // '2 meses a 3 meses', '5 meses a 10 meses', '1 ano a 2 anos', '3 anos ou mais'
            let doisTres = this.dados.filter(data => data.convertido === "2 meses a 3 meses").length
            let cincoDez = this.dados.filter(data => data.convertido === "5 meses a 10 meses").length
            let umDois = this.dados.filter(data => data.convertido === "1 ano a 2 anos").length
            let tresMais = this.dados.filter(data => data.convertido === "3 anos ou mais").length
            let array = {
                '2 a 3 meses': doisTres,
                '5 a 10 meses': cincoDez,
                '1 a 2 anos': umDois,
                '3 anos ou mais': tresMais
            }
            let entries = Object.entries(array);

            // Classificar a matriz com base nos valores (contagens)
            entries.sort((a, b) => b[1] - a[1]);
            let sortedArray = {};
            entries.forEach(entry => {
                sortedArray[entry[0]] = entry[1];
            });

            this.maior = sortedArray

            return [doisTres, cincoDez, umDois, tresMais]
        }
    }
}
</script>