<template>
    <div class="relative h-screen flex overflow-hidden bg-white">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                            <div class="absolute top-0 right-0 -mr-12 pt-2">
                                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                                <span class="sr-only">Close sidebar</span>
                                <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>
                        <div class="flex-shrink-0 flex items-center px-4">
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow" />
                        </div>
                        <div class="mt-5 flex-1 h-0 overflow-y-auto">
                            <nav class="px-2">
                                <div class="space-y-1">
                                    <Link  href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        Dashboard
                                    </Link>
                                    <Link  href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        User Management
                                    </Link>
                                    <Link  href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        Expense Management
                                    </Link>
                                </div>
                            </nav>
                        </div>
                    </div>
                </TransitionChild>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
                <!-- <div class="flex items-center flex-shrink-0 px-6">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow" />
                </div> -->
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="h-0 flex-1 flex flex-col overflow-y-auto">
                    <!-- User account dropdown -->
                    <Menu as="div" class="px-3 mt-6 relative inline-block text-left">
                        <div>
                            <MenuButton class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500">
                                <span class="flex w-full justify-between items-center">
                                    <span class="flex min-w-0 items-center justify-between space-x-3">
                                        <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="" />
                                        <span class="flex-1 flex flex-col min-w-0">
                                        <span class="text-gray-900 text-sm font-medium truncate">{{ $page.props.user.name }}</span>
                                        <span class="text-gray-500 text-sm truncate">Administrator</span>
                                        </span>
                                    </span>
                                    <SelectorIcon class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" aria-hidden="true" />
                                </span>
                            </MenuButton>
                        </div>
                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none">
                                <div class="py-1">
                                    <MenuItem v-slot="{ active }">
                                        <Link :href="route('profile.show')" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Account</Link>
                                    </MenuItem>
                                    </div>
                                    <div class="py-1">
                                </div>
                            </MenuItems>
                        </transition>
                    </Menu>
                    <!-- Navigation -->
                    <nav class="px-3 mt-6">
                        <div class="space-y-1">
                            <Link  href="/dashboard" :class="[route().current('dashboard') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                Dashboard
                            </Link>
                            <Link  href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                User Management
                            </Link>
                                <div class="pl-5">
                                    <Link  v-if="hasAnyPermission(['Super user'])" :href="route('roles.index')" :class="[route().current('roles.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                        Roles
                                    </Link>
                                    <Link  v-if="hasAnyPermission(['Super user'])" :href="route('users.index')" :class="[route().current('users.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                        Users
                                    </Link>
                                </div>
                            <Link  href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                Expense Management
                            </Link>
                            <div class="pl-5">
                                <Link  :href="route('categories.index')" :class="[route().current('categories.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                    Expense Categories
                                </Link>
                                <Link  :href="route('expenses.index')" :class="[route().current('expenses.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                                    Expenses
                                </Link>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Main column -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- Search header -->
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <MenuAlt1Icon class="h-6 w-6" aria-hidden="true" />
                </button>
                <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <SearchIcon class="h-5 w-5" aria-hidden="true" />
                                </div>
                                <input id="search-field" name="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search" />
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <!-- Profile dropdown -->
                        <Menu as="div" class="ml-3 relative">
                        <div>
                            <MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                            </MenuButton>
                        </div>
                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">View profile</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Settings</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Notifications</a>
                                </MenuItem>
                            </div>
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Get desktop app</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Support</a>
                                </MenuItem>
                            </div>
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                <a @click="logout()" href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Logout</a>
                                </MenuItem>
                            </div>
                            </MenuItems>
                        </transition>
                        </Menu>
                    </div>
                </div>
            </div>
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">

                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4 text-sm text-gray-500">
                        <p>Welcome to Expense Manager</p>
                        <a href="#" @click="logout()" class="pl-6"> Log out </a>
                    </div>
                </div>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import { ref } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3'
    import { HomeIcon, MenuAlt1Icon, XIcon, MusicNoteIcon, UsersIcon, ArchiveIcon, UserGroupIcon, CogIcon, CollectionIcon, } from '@heroicons/vue/outline'
    import {
        Dialog,
        DialogOverlay,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
    } from '@headlessui/vue'

    import {
        ChevronRightIcon,
        DotsVerticalIcon,
        DuplicateIcon,
        PencilAltIcon,
        SearchIcon,
        SelectorIcon,
        TrashIcon,
        UserAddIcon,
    } from '@heroicons/vue/solid'

    const navigation = [
        { name: 'Dashboard', href: 'dashboard', icon: '', current: false },
        // { name: 'Teachers', href: 'teachers.index', icon: UsersIcon, current: false },
        // { name: 'Offerings', href: 'offerings.index', icon: ArchiveIcon, current: false },
        // { name: 'Students', href: 'students.index', icon: UsersIcon, current: false },
        // { name: 'Profile', href: 'showProfile', icon: CogIcon, current: false },
        // { name: 'Enrollments', href: 'showEnrollment', icon: CollectionIcon, current: false },
        // { name: 'Enrollees', href: 'enrollees.index', icon: UserGroupIcon, current: false },
    ]

    const teams = [
        { name: 'Voice', href: '#', bgColorClass: 'bg-pink-500' },
        { name: 'Piano', href: '#', bgColorClass: 'bg-indigo-500' },
        { name: 'Violin', href: '#', bgColorClass: 'bg-green-500' },
        { name: 'Others', href: '#', bgColorClass: 'bg-yellow-500' },
    ]

    export default {
        components: {
            Dialog,
            DialogOverlay,
            Menu,
            MenuButton,
            MenuItem,
            MenuItems,
            TransitionChild,
            TransitionRoot,
            Link,
            ChevronRightIcon,
            DotsVerticalIcon,
            DuplicateIcon,
            MenuAlt1Icon,
            PencilAltIcon,
            SearchIcon,
            SelectorIcon,
            TrashIcon,
            UserAddIcon,
            MusicNoteIcon,
            UsersIcon,
            ArchiveIcon,
            UserGroupIcon,
            CollectionIcon,
            CogIcon,
            XIcon,
        },

        setup() {
            const sidebarOpen = ref(false)
            return {
                navigation,
                teams,
                sidebarOpen,
            }
        },

        methods :{
            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
