<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import prueba from '@/Layouts/prueba.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Combobox from "@/Pages/Compra/Combobox copy.vue"


const props = defineProps({
detalle_factura_compras: Object,
factura_compras: Object
});


 //const form = useForm({
  //  factura_compra_id: props.detalle_factura_compras.factura_compra_id,
   // codigo: props.detalle_factura_compras.codigo,
 //   marca: props.detalle_factura_compras.marca,
 //   preciocompra: props.detalle_factura_compras.preciocompra,
 //   cantidad: props.detalle_factura_compras.cantidad,
 //   total: props.detalle_factura_compras.total,

//});

</script>
<template>
    <Head title="Comprar" />
    <prueba>
        <template #header>
            <h2 class="flex uppercase font-bold text-xl text-gray-800 leading-tight">Compras</h2>
        </template>
        <div class="flex flex-col h-full ml-16">

            <div class="px-4 pt-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-y-auto">
                        <form @submit.prevent="">
                            <div class="mt-2 ml-4 inline-flex space-x-2">

                                <div class="flex space-x-2">
                                    <InputLabel for="usuario" value="Usuario:" class="text-gray-600 mt-2 " />
                                    <TextInput id="usuario" type="text" class="mt-1 w-40 h-8 bg-gray-200 text-gray-600"
                                        v-model="form.usuario" required autocomplete="usuario" disabled />

                                    <!--<InputError class="mt-2" :message="form.errors.marca" />-->
                                </div>

                                <div class="flex space-x-2">
                                    <InputLabel for="codigo" value="Codigo:" class="text-gray-600 mt-2" />
                                    <TextInput id="codigo" type="number" v-model="form.codigo"
                                        class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg w-1/3 h-8" disabled />

                                    <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                </div>

                            </div>

                            <div class="mt-4 ml-4">

                                <div class="inline-flex space-x-2">

                                    <div class="flex space-x-2">
                                        <span class="block font-medium text-sm text-gray-700 mt-2">Proveedor</span>
                                        <!--<Combobox :load-options="loadProveedor" v-model="proveedor" />-->
                                    </div>

                                    <div class="flex space-x-2">
                                        <InputLabel for="nrofactura" value="Nro Factura:" class="text-gray-600 mt-2 " />

                                        <TextInput id="nrofactura" type="number"
                                            class="mt-1 w-40 h-8 bg-gray-200 text-gray-600" v-model="form.nrofactura"
                                            required autocomplete="nrofactura" />

                                        <!--<InputError class="mt-2" :message="form.errors.marca" />-->
                                    </div>

                                    <div class="flex space-x-2">
                                        <InputLabel for="fechafactura" value="Fecha Factura:" class="text-gray-600 mt-2 " />

                                        <TextInput id="fechafactura" type="date"
                                            class="mt-1 w-40 h-8 bg-gray-200 text-gray-600" v-model="form.fechafactura"
                                            required autocomplete="fechafactura" />


                                        <!--<InputError class="mt-2" :message="form.errors.marca" />-->
                                    </div>


                                </div>
                            </div>
                            
                        </form>
                       


                    </div>
                </div>
            </div>

            
        </div>
    </prueba>
</template>