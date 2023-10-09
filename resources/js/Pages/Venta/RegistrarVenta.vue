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
        <div class="flex flex-col h-full ml-16">
            <div class="inline-flex">
                <div class="w-4/5 px-4 pt-4">
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-3">

                            <p>Texto a modo de Prueba</p>
                            <p>Texto a modo de Prueba</p>
                            <p>Texto a modo de Prueba</p>


                        </div>
                    </div>
                </div>

                <div class="w-1/5  px-4 pt-4">
                    <div class="bg-white shadow-sm sm:rounded-lg h-screen">
                        <div class="p-3">

                            <p>Texto a modo de Prueba</p>
                            <p>Texto a modo de Prueba</p>
                            <p>Texto a modo de Prueba</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>