<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm } from '@inertiajs/vue3';
import SideBar from '@/Components/SideBar.vue';

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
                   
                    <div class="p-6 text-gray-900">Bienvenido</div>
                    
                </div>
            </div>
        </div>
        
    </AuthenticatedLayout>
</template>
