<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import {PencilIcon, SearchIcon} from "@heroicons/vue/outline";
import Delete from '@/Pages/Producto/delete.vue';
import { ref, watch } from "vue"; 
import Pagination from '@/Components/Pagination.vue';
import _ from 'lodash';
import venta from './venta.vue';
import buscar from './buscar.vue';

const props = defineProps({
producto: Object,
filters: Object,
});
     
let search = ref(props.filters.search);

watch(search, _.debounce(function (value) {
    console.log('disparado');
    router.get('/producto', { search: value}, {
        preserveState: true,
        replace: true
    });
}, 300));


</script>
<script>

export default {
  methods: {
    generarPDF() {
        const url = '/auditoria';
        window.open(url, '_blank');
    },
  },
};
</script>
<template>
    <Head title="Dashboard" />

    <SideBar />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Producto</h2>
        </template>

        <div class="py-12">

            <div class="max-w-screen-2xl mx-auto sm:px-6  ml-16">
                <div class="-mt-10">
                    <div class="flex justify-end">
                       <div class="inline-flex space-x-2 mb-2 mt-2 mr-2">
                        <button @click="generarPDF">Reporte Auditoria</button>
                        <buscar/>
                            <div class="mt-1">
                                <Link 
                                    :href="`/crear-producto/`"
                                    as="button"
                                    class="hover:bg-gray-300 ring-2 focus:ring-set-2 ring-cyan-400 rounded-full">
                                    <i class="h-6 w-6 inline mb-1 ml-2 rounded-full fa-sharp fa-solid fa-prescription-bottle-medical"/>
                                    <a class="text-sm font-medium rounded-md mr-3 "> Crear Producto </a>
                                    
                                </Link>
                            </div>
                            <div
                                class="relative flex items-center  focus-within:text-gray-400"
                                >
                                <SearchIcon
                                    class="w-5 h-5 absolute ml-3 pointer-events-none"
                                />
                                <input
                                    v-model="search"
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
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-slate-300 text-gray-700 text-left">
                                    <th>ID</th>
                                    <th class="px-2">Categoria</th>
                                    <th class="px-2">Descripcion</th>
                                    <th class="px-2">Marca</th>
                                    <th class="px-2">Venta</th>
                                    <th class="px-2">Laboratorio</th>
                                    <th class="px-2">Vencimiento</th>
                                    <th class="px-2">Codigo de barras</th>
                                    <th class="px-2">Precio Venta</th>
                                    <th class="px-2">Precio Compra</th>
                                    <th class="px-2">Stock</th>
                                
                                    <th class="px-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400 divide-opacity-30">
                                <tr v-for="productos in producto.data" :key="productos.id">
                                    <td class="text-gray-700 py-4 px-2">{{productos.id}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.categoria}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.descripcion}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.marca}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.venta}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.laboratorio}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.vencimiento}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.codigo}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.precioventa}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.preciocompra}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{productos.stock}}</td>
                                    
                                    <td class="py-4">
                                        <div class="inline-flex">          
                                            <Link 
                                                :href="`/editar-producto/${productos.id}`"
                                                as="button"
                                                class="w-8 h-8 t hover:bg-black/30 rounded-md grid place-content-center">
                                                <PencilIcon class="w-6 h-6"/>
                                            </Link>                                        
                                            <div>
                                                <Delete :producto="productos" :key="productos.id"/>
                                            </div>
                                            <div>
                                                <venta :productos="productos" :key="productos.id"/>                                                    
                                            </div>
                                        </div>
                                                    
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                        
                        
                    </div>
                    
                </div>
                <!--PAGINACION-->
                <Pagination :links="producto.links" class="mt-6" />
                
            </div>
        </div>
    </AuthenticatedLayout>


</template>
