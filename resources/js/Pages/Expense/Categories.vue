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
                Expense Categories
                </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4 text-sm">
                <p> Expense Management > Categories </p>
            </div>
        </div>
        <!-- Projects table (small breakpoint and up) -->
        <div class="hidden mt-8 sm:block">
            <div class="align-middle inline-block min-w-full border-b border-gray-200">
               <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Display Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Created
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="category in categories" :key="category.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{ category.name }} </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900"> {{ category.description }} </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div> {{ category.created_at }} </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a @click="editCategory(category)" href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a @click="deleteCategory(category)" href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </td>
                        </tr>

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
            <div class="pt-10 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="flex-1 min-w-0">
                    <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">

                    </h1>
                </div>
                <div class="mt-4 flex sm:mt-0 sm:ml-4">
                    <button @click="showAddCategoryModal = !showAddCategoryModal, is_action_update = false" type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">Add Category</button>
                </div>
            </div>
        </div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div v-if="showAddCategoryModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-2 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Add Category
                                </h3>
                                <div class="mt-2">
                                    <div class="space-y-6 sm:space-y-5">
                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                            <label for="amount" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Display Name
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input
                                                    v-model="form.name"
                                                    type="text"
                                                    name="name"
                                                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                                    :class="errors.name ? 'block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md':''"
                                                />
                                            </div>
                                        </div>
                                        <p v-if="errors.entry_date" class="mt-2 text-sm text-red-600" id="email-error">{{ errors.amount }}</p>
                                    </div>
                                    <div class="space-y-6 sm:space-y-5">
                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                            <label for="entry_date" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Description
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input
                                                    v-model="form.description"
                                                    type="text"
                                                    name="description"
                                                    class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                                    :class="errors.description ? 'block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md':''"
                                                />
                                            </div>
                                        </div>
                                        <p v-if="errors.description" class="mt-2 text-sm text-red-600" id="email-error">{{ errors.description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button v-if="!is_action_update" @click="addCategory" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                        </button>
                        <button v-if="is_action_update" @click="updateCategory" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Update
                        </button>
                        <button @click="showAddCategoryModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import { ref } from 'vue'
    import { computed } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3'
    import { usePage } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default {

        props: {
            preloaded_categories:Object,
        },

        components: {
            AppLayout,
            Link
        },

        setup() {
            const sidebarOpen = ref(false)
            const preloaded_categories = computed(() => usePage().props.value.preloaded_categories);
            return {
                sidebarOpen,
                preloaded_categories
            }
        },

        data() {
            return {
                errors:[],
                is_action_update:false,
                showAddCategoryModal:false,
                categories:this.preloaded_categories,
                form: {
                    id:null,
                    name:null,
                    description:null
                }
            }
        },

        methods:{
            addCategory(){
                axios.post("/categories", this.form)
                    .then(response => {
                        this.categories = response.data;
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                });
            },

            editCategory(category){
                this.form.id = category.id;
                this.form.name = category.name;
                this.form.description = category.description;

                this.is_action_update = true;
                this.showAddCategoryModal = true;
            },

            updateCategory(){
                axios.patch("/categories/"+this.form.id, this.form)
                    .then(response => {
                        this.categories = response.data;
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                });
            },

            deleteCategory(category){
                if(confirm('Are you sure you want to remove this expense?')){
                    axios.delete("/categories/"+category.id)
                        .then(response => {
                            let i = this.categories.map(data => data.id).indexOf(category.id);
                            this.categories.splice(i, 1)
                        })
                        .catch(error => {
                            alert("Cannot perform delete because category is used in expenses!");
                            this.errors = error.response.data.errors;
                    });
                }
            },

            resetFields(){
                this.form.name = null;
                this.form.description = null;
            }
        },

        watch :{
            is_action_update :function(val){
                if(val == false){
                    this.resetFields();
                }
            }
        }
    }
</script>
