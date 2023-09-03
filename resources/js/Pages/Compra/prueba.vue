<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import prueba from '@/Layouts/prueba.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {XIcon} from "@heroicons/vue/outline";
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';


const form = useForm({
    usuario: '',
    codigo: '',

});

</script>
<template>
    <Head title="Comprar" />   
    <prueba>     
        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Compras</h2>
        </template>
        <div class="flex flex-col h-full ml-16">
            
                <div class="px-4 pt-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-72 ">
                        <div class="overflow-y-auto">
                            <form @submit.prevent="submit">
                                <div class="mt-4 inline-flex space-x-10">

                                    <div>
                                        <InputLabel for="usuario" value="Usuario" class="text-gray-600"/>

                                    <TextInput
                                        
                                        id="usuario"
                                        type="text"
                                        class="mt-1  bg-gray-200 text-gray-600"
                                        v-model="form.usuario"
                                        required
                                        autocomplete="usuario"
                                    />


                                    <!--<InputError class="mt-2" :message="form.errors.marca" />--> 
                                    </div>

                                    <div>
                                        <InputLabel for="codigo" value="Codigo" class="text-gray-600"/>
                                    <select type="text" v-model="form.codigo"   class="mt-1  bg-gray-200 text-gray-600 sm:rounded-lg">
                                        <option disabled value="">codigo</option>
                                    </select>


                                        <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <div class="flex-1 overflow-hidden">
                <div class="h-full px-4 pb-4 pt-4">
                    <div class=" bg-white max-h-full flex flex-col rounded-md border border-blue-500">
                        
                            <div class="px-2 py-3 overflow-y-auto">
                            
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
                                <tr v-for="item in Array.from({length: 2})">
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
        </div>
    </prueba>
</template>