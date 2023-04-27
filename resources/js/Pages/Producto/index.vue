<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import {PencilIcon, UserAddIcon, SearchIcon} from "@heroicons/vue/outline";

const props = defineProps({
producto: Object
});

</script>
<template>
    <Head title="Dashboard" />

    <SideBar />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Producto</h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ml-16">
                <div class="-mt-10">
                    <div class="flex justify-end">
                       <!-- <span class="pt-2 pr-6">hola</span>-->
                       <div class="inline-flex space-x-2 mb-2 mt-2 mr-2">
                            <div class="mt-1">
                                <Link 
                                    :href="`/crear-producto/`"
                                    as="button"
                                    class="hover:bg-gray-300 ring-2 focus:ring-set-2 ring-cyan-400 rounded-full">
                                    <UserAddIcon class="h-6 w-6 inline mb-1 ml-2 rounded-full"/>
                                    <a class="text-sm font-medium rounded-md mr-3"> Crear Producto </a>
                                </Link>
                            </div>
                            <div
                                class="relative flex items-center  focus-within:text-gray-400"
                                >
                                <SearchIcon
                                    class="w-5 h-5 absolute ml-3 pointer-events-none"
                                />
                                <input
                                    type="text"
                                    placeholder="Buscar Productos"
                                    autocomplete="off"
                                    aria-label="Buscar Productos"
                                    class="pr-3 pl-10 py-1 text-sm font-medium text-gray-700 bg-cyan-100 rounded-2xl border-none ring-2 ring-cyan-400 focus:ring-cyan-300 focus:ring-2"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   
                    <div class="px-10 pb-10 pt-2 overflow-y-auto">

                        
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
