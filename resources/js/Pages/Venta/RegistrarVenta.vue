<script setup>
import Layout from '@/Layouts/Layout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';

</script>
<template>
    <Head title="Ventas" />
    <Layout>
        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Ventas</h2>
        </template>
        <div class="h-screen">
            <div class="ml-16 grid grid-rows-6 grid-cols-5 gap-4 mt-4 px-3 pb-2 h-90">

                <div class="col-end-5 col-start-1 row-span-3 bg-white">
                    01
                </div>
                <div class="flex-1 row-span-3 col-end-5 col-start-1 bg-white overflow-hidden">
                    <div class="h-full">
                        <div class="max-h-full flex flex-col">
                            <div class="px-3 mt-2 overflow-y-auto">

                                <table class="min-w-full">
                                    <thead >
                                        <tr class="text-left uppercase">
                                            <th>ID</th>
                                            <th>C. Barras</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Dto.</th>
                                            <th>Importe</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-400 divide-opacity-30">
                                        <tr v-for="item in Array.from({ length: 20 })">
                                            <td class="text-gray-700 py-4"> 1</td>
                                            <td class="text-gray-700 py-4">123123</td>
                                            <td class="text-gray-700 py-4 uppercase">dolanet</td>
                                            <td class="text-gray-700 py-4">20.000</td>
                                            <td class="text-gray-700 py-4">2</td>
                                            <td class="text-gray-700 py-4">15</td>
                                            <td class="text-gray-700 py-4">40.000</td>
                                            <td class="py-4">
                                                <div class="inline-flex">
                                                    <div>
                                                        <button
                                                            class="w-8 h-8 t hover:text-red-700 text-red-500 rounded-md grid place-content-center">
                                                            Remover
                                                        </button>
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
                <div class="col-start-5 row-start-1 row-end-7 bg-white">
                    03
                </div>
            </div>
        </div>
    </Layout>
</template>

<style>
.h-90 {
    height: 85%;
}

thead {
  background-color: white;
  position: sticky;
  top: 0;
  z-index: 2;
}


th {
  position: relative;

}

/* Pseudo-elemento ::before para crear un borde inferior */
th::before {
    content: '';
    position: absolute;
    bottom: -2px; /* Ajusta el valor según el grosor del borde */
    left: 0;
    width: 100%;
    height: 2px; /* Grosor del borde */
    background-color: #6b7280; /* Color del borde */
}
</style>