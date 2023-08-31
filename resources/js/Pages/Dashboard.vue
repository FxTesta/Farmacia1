<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';
import TopBar from '@/Layouts/TopBar.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    lala: '',

});
</script>

<template>
    <Head title="Dashboard" />

    <SideBar/>
    <AuthenticatedLayout>
        
        <template #header>
            <h2 class="font-bold uppercase text-xl text-gray-800 leading-tight">Dashboard</h2>            
        </template>

        <div class="py-12">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   
                    <div class="p-6 text-gray-900">You're logged in!</div>
                    <!--PRUEBAAAAAAAAAAAAAAAAAAAAAAAA-->
                    <form @submit.prevent="submit">

                            <div class="ml-2 inline-flex space-x-2">

                                <div>
                                    <InputLabel for="name" value="Nombre" class="text-gray-600"/>

                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="mt-1 block  bg-gray-200 text-gray-600"
                                        v-model="form.name"
                                        required
                                        autofocus
                                        autocomplete="name"
                                    />

                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div>
                                    <InputLabel for="lala" value="Apellido" class="text-gray-600"/>

                                    <TextInput
                                        id="lala"
                                        type="text"
                                        class="mt-1 block  bg-gray-200 text-gray-600"
                                        v-model="form.lala"
                                        required
                                        autofocus
                                        autocomplete="lala"
                                    />

                                    <InputError class="mt-2" :message="form.errors.lala" />
                                </div>

                            </div>

                            <div class="flex items-center justify-end mt-6">

                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Crear Cliente
                                </PrimaryButton>
                            </div>
                        </form> 

                    <!--PRUEBAAAAAAAAAAAAAAAAAAAAAAAA-->

                </div>
            </div>
        </div>
        
    </AuthenticatedLayout>
</template>
