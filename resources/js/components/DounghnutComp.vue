<template>
    <Doughnut :data="data" :options="options" ref="chart" />
    <p style="position: absolute; bottom: 10px; left: 10px; ">{{ maior??null }}</p>
</template>
<script>

import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, BarElement, CategoryScale, LinearScale, ArcElement } from 'chart.js'
import { Doughnut } from 'vue-chartjs'

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, PointElement, LineElement, Legend, ArcElement)

export default {
    props: {
        dados: Array
    },
    components: {
        Doughnut,
    },
    data() {
        return {
            maior: null,
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
                        position: 'left',
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
        calculo() {
            // '2 meses a 3 meses', '5 meses a 10 meses', '1 ano a 2 anos', '3 anos ou mais'
            let doisTres = this.dados.filter(data => data.convertido === "2 meses a 3 meses").length
            let cincoDez = this.dados.filter(data => data.convertido === "5 meses a 10 meses").length
            let umDois = this.dados.filter(data => data.convertido === "1 ano a 2 anos").length
            let tresMais = this.dados.filter(data => data.convertido === "3 anos ou mais").length
            let array = [doisTres, cincoDez, umDois, tresMais]
            let titles = ['2 a 3 meses', '5 a 10 meses', '1 a 2 anos', '3 anos ou mais']
            const maiorNumero = Math.max(...array);
            const posicao = array.indexOf(maiorNumero);
            this.maior = titles[posicao] + " : " + maiorNumero;
            return [doisTres, cincoDez, umDois, tresMais]
        }
    }
}
</script>