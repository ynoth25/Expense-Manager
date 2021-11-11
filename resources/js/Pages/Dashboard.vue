<template>
    <app-layout>
        <div class="pt-10 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">
                <h1 class="text-base font-medium leading-6 text-gray-900 sm:truncate">
                My Expenses
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4 text-sm">
                <p> Dashboard </p>
            </div>
        </div>
        <!-- Projects table (small breakpoint and up) -->
        <div class="hidden mt-8 sm:block">
            <div class="align-middle inline-block min-w-11/12 border-b border-gray-200">
                <!-- Chart -->
                <vue3-chart-js
                    :id="pieChart.id"
                    :type="pieChart.type"
                    :data="pieChart.data"
                ></vue3-chart-js>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import { ref } from 'vue'
    import { computed } from 'vue'
    import {Chart} from 'chart.js'
    import Vue3ChartJs from '@j-t-mcc/vue3-chartjs'
    import { Link } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default {

        props: {
           data:Object,
        },

        components: {
            AppLayout,
            Vue3ChartJs,
            Link,
            Chart,
        },

        setup () {
            return {}
        },

        data() {
            return {
                pieChart : {
                    id: 'pie',
                    type: 'pie',
                    data: {
                        labels: this.data.labels,
                        datasets: [
                        {
                            backgroundColor: [
                            '#41B883',
                            '#E46651',
                            '#00D8FF',
                            '#DD1B16'
                            ],
                            

                            data: this.data.data
                        }
                        ]
                    }
                }

            }
        },

        methods:{
        },
    }
</script>
