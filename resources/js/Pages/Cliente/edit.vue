<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ArrowLeftIcon} from "@heroicons/vue/outline";
import { ref, onBeforeUpdate } from 'vue';
import { calcularDigitoVerificador } from '@/dv';
//import TopBar from '@/Layouts/TopBar.vue';

const props = defineProps({
cliente: Object
});

const form = useForm({
    name: props.cliente.name,
    cedula: props.cliente.cedula,
    ruc: props.cliente.ruc,
    dv: props.cliente.dv,
    direccion: props.cliente.direccion,
    referencia: props.cliente.referencia,
    barrio: props.cliente.barrio,
    callelateral: props.cliente.callelateral,
    telefono: props.cliente.telefono,
    email: props.cliente.email,
});

const calculatedDV = ref(null);

const calculateDV = () => {
    const ruc = form.ruc;
    const dv = calcularDigitoVerificador(ruc);
    form.dv = dv;
};

calculateDV();

onBeforeUpdate(() => {
    calculateDV();
});

const submit = () => {

    form.put(route('cliente.update',{cliente: props.cliente.id}));
};

</script>

<template>
    <Head title="Dashboard" />

    <SideBar />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Editar Cliente</h2>
        </template>

        <div class="py-12">

            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="-mt-9 mb-2">
                        <Link
                            class="w-8 h-8 bg-black/20 hover:bg-black/30 rounded-md grid place-content-center"
                            as="button" :href="route('cliente')">
                            <ArrowLeftIcon class="w-5 h-5" />
                        </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="px-10 pb-10 pt-5 overflow-y-auto">

                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Nombre" class="text-gray-600"/>

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />

                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                         
                            <div class="mt-4">
                                <InputLabel for="cedula" value="Cedula" class="text-gray-600"/>

                                <TextInput
                                    id="cedula"
                                    type="number"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.cedula"
                                    required
                                    autofocus
                                    autocomplete="cedula"
                                />

                                <InputError class="mt-2" :message="form.errors.cedula" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="ruc" value="Ruc Opcional" class="text-gray-600"/>

                                <TextInput
                                    id="ruc"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.ruc"
                                    autocomplete="ruc"
                                    @input="calculateDV"
                                />

                                <div v-if="calculatedDV !== null" class="text-gray-600 mt-1">DV: {{ calculatedDV }}</div>

                                <InputError class="mt-2" :message="form.errors.ruc" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="dv" value="dv" class="text-gray-600"/>

                                <TextInput
                                    id="dv"
                                    type="number"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.dv"
                                    autocomplete="dv"
                                    placeholder="se genera al guardar"
                                    readonly
                                />

                                <InputError class="mt-2" :message="form.errors.dv" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="direccion" value="Direccion" class="text-gray-600"/>

                                <TextInput
                                    id="direccion"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.direccion"
                                    required
                                    autocomplete="direccion"
                                />

                                <InputError class="mt-2" :message="form.errors.direccion" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="callelateral" value="Calle lateral" class="text-gray-600"/>

                                <TextInput
                                    id="callelateral"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.callelateral"
                                    autocomplete="callelateral"
                                />

                                <InputError class="mt-2" :message="form.errors.callelateral" />
                            </div>
                            
                            <div class="mt-4">
                                <InputLabel for="barrio" value="Barrio" class="text-gray-600"/>

                                <TextInput
                                    id="barrio"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.barrio"
                                   
                                    autocomplete="barrio"
                                />

                                <InputError class="mt-2" :message="form.errors.barrio" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="referencia" value="Referencias Dirección" class="text-gray-600"/>

                                <TextInput
                                    id="referencia"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.referencia"
                                    autocomplete="referencia"
                                />

                                <InputError class="mt-2" :message="form.errors.referencia" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="telefono" value="Numero Telefono" class="text-gray-600"/>

                                <TextInput
                                    id="telefono"
                                    type="number"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.telefono"
                                    required
                                    autocomplete="telefono"
                                />

                                <InputError class="mt-2" :message="form.errors.telefono" />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="email" value="Email" class="text-gray-600"/>

                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.email"
                                    
                                    autocomplete="email"
                                />

                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="flex items-center justify-end mt-6">

                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Editar Cliente
                                </PrimaryButton>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
