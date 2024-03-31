<template>
    <Bar :data="data" :options="options" />
</template>
<script>
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, BarElement, CategoryScale, LinearScale, ArcElement } from 'chart.js'
import { Bar } from 'vue-chartjs';

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, PointElement, LineElement, Legend, ArcElement)

export default {
    props: {
        maior: Number,
        menor: Number
    },
    components: {
        Bar
    },
    data() {

        return {
            data: {
                labels: ['Rank'],
                datasets: [
                    {
                        label: 'Maiores',
                        data: [this.maior],
                        borderColor: 'limegreen',
                        backgroundColor: ('lime'),
                    },
                    {
                        label: 'Menores',
                        data: [this.menor],
                        borderColor: 'green',
                        backgroundColor: ('green'),
                    }
                ]
                
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'x',
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            color: '#fff' // cor da legenda
                        }
                    },
                    title: {
                        display: false,
                        text: 'Chart.js Horizontal Bar Chart',
                        color: 'white'
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: 'white'
                        },
                        ticks: {
                            color: 'white' // cor do texto do eixo x
                        },
                    },
                    x: {
                        grid: {
                            color: 'white'
                        },
                        ticks: {
                            color: 'white' // cor do texto do eixo x
                        },

                        display: true,
                        offset: true,

                    },
                },
            },
        }

    }

}
</script>