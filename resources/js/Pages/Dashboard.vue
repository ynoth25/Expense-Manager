<template>
    <app-layout>
         <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0">

            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4 text-sm text-gray-500">
                <p>Welcome to Expense Manager</p>
                <p class="pl-6"> Log out </p>
            </div>
        </div>

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
            <div class="align-middle inline-block min-w-full border-b border-gray-200">
                <!-- Chart -->
            </div>
        </div>
    </app-layout>
</template>
<script>
    import { ref } from 'vue'
    import { computed } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default {

        props: {
           
        },

        components: {
            AppLayout,
            Link
        },

        setup() {
           
        },

        data() {
            return {
               
            }
        },

        methods:{
            
        },
    }
</script>
