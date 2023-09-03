<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import {XIcon} from "@heroicons/vue/outline";


</script>
<template>
    <Head title="Dashboard" />

    <SideBar />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Compras</h2>
        </template>

        <div class="py-3 space-y-2">

            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 ml-16">
                <div class="bg-red-300 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-10 pb-10 pt-2 overflow-y-auto">
                        <span>div pa campos de compra y cargar productos</span>
                    </div>
                </div>
            </div>

            <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 ml-16">
                <!--  --- BUSCADOR Y AGREGAR OCULTO
                <div class="-mt-10">
                    <div class="flex justify-end">
                       <div class="inline-flex space-x-2 mb-2 mt-2 mr-2">
                            <div class="mt-1">
                                <Link 
                                    :href="`/crear-proveedor/`"
                                    as="button"
                                    class="hover:bg-gray-300 ring-2 focus:ring-set-2 ring-cyan-400 rounded-full">
                                    <UserAddIcon class="h-6 w-6 inline mb-1 ml-2 rounded-full"/>
                                    <a class="text-sm font-medium rounded-md mr-3"> Registrar Proveedor </a>
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
                                    placeholder="Buscar Proveedores"
                                    autocomplete="off"
                                    aria-label="Buscar Proveedores"
                                    class="pr-3 pl-10 py-1 text-sm font-medium text-gray-700 bg-cyan-100 rounded-2xl border-none ring-2 ring-cyan-400 focus:ring-cyan-300 focus:ring-2"
                                />
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   
                    <div class="px-10 pb-10 pt-2 max-h-screen overflow-y-auto">

                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-slate-300 text-gray-700 text-left">
                                    <th>ID</th>
                                    <th>C. Barras</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Importe</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400 divide-opacity-30">
                                <tr v-for="item in Array.from({length: 50})">
                                    <td class="text-gray-700 py-4"> 1 </td>
                                    <td class="text-gray-700 py-4">72000120</td>
                                    <td class="text-gray-700 py-4 uppercase">dolanet</td>
                                    <td class="text-gray-700 py-4">10.000</td>
                                    <td class="text-gray-700 py-4">2</td>
                                    <td class="text-gray-700 py-4">20.000</td>
                                    <td class="py-4">
                                        <div class="inline-flex">          
                                            <div>
                                                <Link 
                                                href="#"
                                                as="button"
                                                class="w-8 h-8 t hover:text-red-700 text-red-500 rounded-md grid place-content-center">
                                                <XIcon class="w-6 h-6"/>
                                            </Link>
                                            </div>
                                        </div>
                                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
