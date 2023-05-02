<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ArrowLeftIcon} from "@heroicons/vue/outline";

const form = useForm({
    categoria: '',
    descripcion: '',
    marca: '',
    venta: '',
    laboratorio: '',
    regsanitario: '',
    vencimiento: '',
    alerta: '',
    codigo: '',
    precioventa: '',
    preciocompra: '',
    stock: '',
    stockmin: '',
});

const submit = () => {
    form.post(route('producto.store'));
};

</script>

<template>
    <Head title="Dashboard" />

    <SideBar />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Nuevo Producto</h2>
        </template>

        <div class="py-12">

            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="-mt-9 mb-2">
                        <Link
                            class="w-8 h-8 bg-black/20 hover:bg-black/30 rounded-md grid place-content-center"
                            as="button" :href="route('producto')">
                            <ArrowLeftIcon class="w-5 h-5" />
                        </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="px-10 pb-10 pt-5 overflow-y-auto">

                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Descripcion" class="text-gray-600"/>

                                <TextInput
                                    id="descripcion"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.descripcion"
                                    required
                                    autofocus
                                    autocomplete="descripcion"
                                />
                                <InputError class="mt-2" :message="form.errors.descripcion" />

                            </div>

                            
                            <div class="mt-4">
                                <InputLabel for="marca" value="Marca" class="text-gray-600"/>

                                <TextInput
                                    id="marca"
                                    type="text"
                                    class="mt-1  bg-gray-200 text-gray-600"
                                    v-model="form.marca"
                                    required
                                    autocomplete="marca"
                                />

                                <InputError class="mt-2" :message="form.errors.marca" />
                            </div>

                            <div class="mt-4">                               
                                
                                <InputLabel for="venta" value="Tipo de venta" class="text-gray-600"/>
                                <select type="text" v-model="form.venta"   class="mt-1  bg-gray-200 text-gray-600 sm:rounded-lg">
                                    <option disabled value="">Seleccione un elemento</option>
                                    <option>Libre</option>
                                    <option>Bajo receta</option>
                                </select>

                                
                            </div>

                            <div class="mt-4">
                                <InputLabel for="laboratorio" value="Laboratorio" class="text-gray-600"/>

                                <TextInput
                                    id="laboratorio"
                                    type="text"
                                    class="mt-1 w-full bg-gray-200 text-gray-600"
                                    v-model="form.laboratorio"
                                    required
                                    autocomplete="laboratorio"
                                />

                                
                            </div>

                            <div class="mt-4">
                                <InputLabel for="regsanitario" value="Reg. Sanitario" class="text-gray-600"/>

                                <TextInput
                                    id="regsanitario"
                                    type="text"
                                    class="mt-1 w-full bg-gray-200 text-gray-600"
                                    v-model="form.regsanitario"
                                    required
                                    autocomplete="regsanitario"
                                />
                            </div>
                            
                            <div class="mt-4">
                                
                            </div>

                            <div class="mt-4">
                                
                            </div>

                            <div class="mt-4">
                                
                            </div>

                            <div class="mt-4">
                                
                            </div>

                            <div class="flex items-center justify-end mt-6">

                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Crear Producto
                                </PrimaryButton>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
