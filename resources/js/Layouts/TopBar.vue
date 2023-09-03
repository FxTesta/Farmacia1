<script setup>
import { Link } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import {UserIcon} from "@heroicons/vue/outline";
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>
<template>
    <div>
        <div class="flex min-h-screen">
            <SideBar/>
            <div class="flex-1">
                <div class="flex flex-col h-screen bg-black">
                    <nav class="shrink-0 flex justify-between bg-black border-b border-gray-600">
                                                <div class="px-3">
                                                <ApplicationLogo class="w-24 h-14 ml-16"/>
                                                </div>
                                                <div class="flex items-center px-3">
                                                    <Menu as="div" class="relative z-10">
                                                        <MenuButton class="hover:bg-gray-600 ring-2 focus:ring-set-2 ring-gray-400 rounded-full">
                                                            <UserIcon class="h-6 w-6 inline mb-1 ml-2 rounded-full text-white"/>
                                                            <a class="text-sm text-white font-medium rounded-md mr-3"> {{ $page.props.auth.user.name }} </a>
                                                        </MenuButton>
                                                    
                                                        <transition
                                                            enter-active-class="transition transform duration-100 ease-out"
                                                            enter-from-class="opacity-0 scale-90"
                                                            enter-to-class="opacity-100 scale-100"
                                                            leave-active-class="transition transform duration-100 ease-in"
                                                            leave-from-class="opacity-100 scale-100"
                                                            leave-to-class="opacity-0 scale-90"
                                                        >
                                                            <MenuItems class="origin-top-right mt-2 focus:outline-none absolute right-0 bg-black overflow-hidden rounded-md shadow-lg border border-gray-600 w-48">
                                                            <MenuItem v-slot="{active}">
                                                                <Link :class="{'bg-gray-500': active}"
                                                                :href="route('logout')" method="post" as="button"
                                                                class="w-full text-left block px-4 py-2 text-sm text-white">Cerrar Sesión</Link>
                                                            </MenuItem>
                                                            </MenuItems>
                                                        </transition>
                                                    </Menu>

                                                </div>
                    </nav>
                    <!-- Page Content -->
                    <main class="flex-1 overflow-hidden">
                        <slot />
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>
