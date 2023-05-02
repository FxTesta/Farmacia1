
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ArrowLeftIcon} from "@heroicons/vue/outline";
import Datepicker from 'flowbite-datepicker/Datepicker';

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
                            <div class=" inline-flex space-x-10">

                                <div>
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

                                <div>
                                    <InputLabel for="venta" value="Tipo de venta" class="text-gray-600"/>
                                <select type="text" v-model="form.venta"   class="mt-1  bg-gray-200 text-gray-600 sm:rounded-lg">
                                    <option disabled value="">Seleccione un elemento</option>
                                    <option>Libre</option>
                                    <option>Bajo receta</option>
                                </select>


                                    <InputError class="mt-2" :message="form.errors.venta" />
                                </div>
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
                            
                            <div class=" inline-flex space-x-10">
                                <div >
                                    
                                    <InputLabel for="vencimiento" value="Vencimiento" class="text-gray-600"/>
                                
                                    <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input datepicker datepicker-format="mm/dd/yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selecciona la fecha">
                                    </div>

                                </div>

                                <div >
                                    
                                    <InputLabel for="vencimiento" value="Alerta de vencimiento" class="text-gray-600"/>
                                
                                    <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input datepicker datepicker-format="mm/dd/yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selecciona la fecha">
                                    </div>

                                </div>
                            </div>
                            <div class="mt-4">
                                <InputLabel for="codigo" value="Codigo" class="text-gray-600"/>

                                <TextInput
                                    id="codigo"
                                    type="number"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.codigo"
                                    required
                                    autocomplete="codigo"
                                />

                                <InputError class="mt-2" :message="form.errors.codigo" />
                            </div>

                            <div class=" inline-flex space-x-10">
                                <div>
                                    <InputLabel for="precioventa" value="Precio de venta" class="text-gray-600"/>

                                    <TextInput
                                        id="precioventa"
                                        type="number"
                                        class="mt-1 block w-full bg-gray-200 text-gray-600"
                                        v-model="form.precioventa"
                                        required
                                        autocomplete="precioventa"
                                    />

                                    <InputError class="mt-2" :message="form.errors.precioventa" />
                                </div>

                                <div>
                                    <InputLabel for="preciocompra" value="Precio de compra" class="text-gray-600"/>

                                    <TextInput
                                        id="preciocompra"
                                        type="number"
                                        class="mt-1 block w-full bg-gray-200 text-gray-600"
                                        v-model="form.preciocompra"
                                        required
                                        autocomplete="preciocompra"
                                    />

                                    <InputError class="mt-2" :message="form.errors.preciocompra" />
                                </div>
                            </div>

                            <div class=" inline-flex space-x-10">
                                <div >
                                    <InputLabel for="stock" value="Stock" class="text-gray-600"/>

                                    <TextInput
                                        id="stock"
                                        type="number"
                                        class="mt-1 block w-full bg-gray-200 text-gray-600"
                                        v-model="form.stock"
                                        required
                                        autocomplete="stock"
                                    />
                                    <InputError class="mt-2" :message="form.errors.stock" />
                                </div>

                                <div >
                                    <InputLabel for="stockmin" value="Stock Minimo" class="text-gray-600"/>

                                    <TextInput
                                        id="stockmin"
                                        type="number"
                                        class="mt-1 block w-full bg-gray-200 text-gray-600"
                                        v-model="form.stockmin"
                                        required
                                        autocomplete="stockmin"
                                    />
                                    <InputError class="mt-2" :message="form.errors.stockmin" />
                                </div>
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
