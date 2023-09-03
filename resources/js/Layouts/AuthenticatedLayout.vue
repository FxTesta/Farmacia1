<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import {UserIcon} from "@heroicons/vue/outline";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>

        <div class="min-h-screen bg-cyan-100">
            <nav class="bg-white border-b border-gray-100">

                <!-- Primary Navigation Menu -->
                

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="shrink-0 flex justify-between">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
                <div class="flex items-center px-3">
                                                    <Menu as="div" class="relative z-10">
                                                        <MenuButton class="hover:bg-gray-400 ring-2 focus:ring-set-2 ring-gray-400 rounded-full">
                                                            <UserIcon class="h-6 w-6 inline ml-2 rounded-full"/>
                                                            <a class="text-sm text-black font-medium rounded-md mr-3"> {{ $page.props.auth.user.name }} </a>
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
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
