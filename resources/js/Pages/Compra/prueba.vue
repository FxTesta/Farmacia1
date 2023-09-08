<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import prueba from '@/Layouts/prueba.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import {XIcon, SearchIcon, PlusCircleIcon, SaveIcon} from "@heroicons/vue/outline";
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';


const form = useForm({
    usuario: 'ADMIN',
    codigo: '2',
    codigobarra: '727372133333',
    stock: '999',
    precio: '10000',
    cantidad: '2',
    total: '20000',
    preciototal: '40000',
    proveedor: 'Lasca',
    nrofactura: '21312321',
    descripcion: 'DOLANET',
    fechafactura: mindate(),
    
});

function mindate(){
	return new Date().toISOString().split('T')[0]
}

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
                            <form @submit.prevent="submit">
                                <div class="mt-2 ml-4 inline-flex space-x-2">

                                    <div class="flex space-x-2">
                                        <InputLabel for="usuario" value="Usuario:" class="text-gray-600 mt-2 "/>

                                    <TextInput
                                        
                                        id="usuario"
                                        type="text"
                                        class="mt-1 w-40 h-8 bg-gray-200 text-gray-600"
                                        v-model="form.usuario"
                                        required
                                        autocomplete="usuario"
                                        disabled
                                    />


                                    <!--<InputError class="mt-2" :message="form.errors.marca" />--> 
                                    </div>
                                        <div class="flex space-x-2">
                                            <InputLabel for="codigo" value="Codigo:" class="text-gray-600 mt-2"/>
                                        <TextInput 
                                        
                                            type="text" 
                                            v-model="form.codigo"
                                            class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg w-1/3 h-8" 
                                            disabled
                                            
                                        />


                                            <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                        </div>
                                </div>

                                <div class="mt-4 ml-4">

                                    <div class="inline-flex space-x-2">
                                        <div class="flex space-x-2">
                                                <InputLabel for="proveedor" value="Proveedor:" class="text-gray-600 mt-2 "/>

                                            <TextInput
                                                
                                                id="proveedor"
                                                type="text"
                                                class="mt-1 w-40 h-8 bg-gray-200 text-gray-600"
                                                v-model="form.proveedor"
                                                required
                                                autocomplete="proveedor"
                                                disabled
                                            />


                                            <!--<InputError class="mt-2" :message="form.errors.marca" />--> 
                                        </div>

                                        <div class="mt-1">
                                            <Link 
                                                href="#"
                                                as="button"
                                                class="w-8 h-8 hover:text-blue-700 text-blue-400 rounded-md grid place-content-center">
                                                <SearchIcon class="w-6 h-6"/>
                                            </Link>
                                        </div>

                                        <div class="flex space-x-2">
                                                <InputLabel for="nrofactura" value="Nro Factura:" class="text-gray-600 mt-2 "/>

                                            <TextInput
                                                
                                                id="nrofactura"
                                                type="number"
                                                class="mt-1 w-40 h-8 bg-gray-200 text-gray-600"
                                                v-model="form.nrofactura"
                                                required
                                                autocomplete="nrofactura"
                                                disabled
                                            />


                                            <!--<InputError class="mt-2" :message="form.errors.marca" />--> 
                                        </div>

                                        <div class="flex space-x-2">
                                                <InputLabel for="fechafactura" value="Fecha Factura:" class="text-gray-600 mt-2 "/>

                                            <TextInput
                                                
                                                id="fechafactura"
                                                type="date"
                                                class="mt-1 w-40 h-8 bg-gray-200 text-gray-600"
                                                v-model="form.fechafactura"
                                                required
                                                autocomplete="fechafactura"
                                                
                                                
                                            />


                                            <!--<InputError class="mt-2" :message="form.errors.marca" />--> 
                                        </div>

                                        
                                    </div>
                                </div>
                                <div class="flex justify-end pr-3">
                                    <div class=" w-fit mr-2">
                                        <Link 
                                            href="#"
                                            as="button"
                                            class="hover:bg-gray-300 ring-2 focus:ring-set-2 ring-cyan-400 rounded-md">
                                            <i class="h-6 w-6 inline mb-1 ml-2 fa-sharp fa-solid fa-floppy-disk"/>
                                            <a class="text-sm font-bold rounded-md mr-3 uppercase">realizar compra</a>
                                            
                                        </Link>
                                    </div>
                                    <div class=" w-fit border-2 border-gray-500">
                                        <span class="text-black font-bold text-xl pr-3">P. TOTAL:</span>
                                        <span class="text-red-500 font-bold text-xl pr-3">20.000</span>
                                    </div>
                                </div>
                                <div class="-mt-4">
                                    <span class="uppercase font-bold text-base p-3">producto</span>
                                    <div class="border-4 border-blue-500 rounded-md">
                                        <div class="p-2 pt-4 pb-4">
                                            <div class="inline-flex">
                                                <div class="mt-7">
                                                    <Link 
                                                        href="#"
                                                        as="button"
                                                        class="w-8 h-8 hover:bg-blue-300 hover:text-blue-700 text-blue-400 ring-2 focus:ring-set-2 ring-gray-400 rounded-full grid place-content-center">
                                                        <SearchIcon class="w-6 h-6"/>
                                                    </Link>
                                                </div>
                                                <div class="ml-2">
                                                    <InputLabel for="codigo" value="Codigo de Barras" class="text-gray-600 "/>
                                                    <TextInput 
                                                        
                                                        type="number" 
                                                        v-model="form.codigobarra"
                                                        class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg w-36" 
                                                        disabled
                                                            
                                                    />
                                                    <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                                </div>
                                                <div class="ml-4">
                                                    <InputLabel for="descripcion" value="Descripción" class="text-gray-600 "/>
                                                    <TextInput 
                                                        
                                                        type="text" 
                                                        v-model="form.descripcion"
                                                        class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg w-96" 
                                                        disabled
                                                            
                                                    />
                                                    <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                                </div>
                                                <div class="ml-4">
                                                    <InputLabel for="stock" value="Stock" class="text-gray-600 "/>
                                                    <TextInput 
                                                        
                                                        type="number" 
                                                        v-model="form.stock"
                                                        class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg w-20"
                                                        disabled
                                                            
                                                    />
                                                    <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                                </div>
                                                <div class="ml-4">
                                                    <InputLabel for="precio" value="Precio" class="text-gray-600 "/>
                                                    <TextInput 
                                                        
                                                        type="number" 
                                                        v-model="form.precio"
                                                        class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg w-32"
                                                        disabled
                                                            
                                                    />
                                                    <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                                </div>
                                                <div class="ml-4">
                                                    <InputLabel for="cantidad" value="Cantidad" class="text-gray-600 "/>
                                                    <TextInput 
                                                        
                                                        type="number" 
                                                        v-model="form.cantidad"
                                                        class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg w-20"
                                                        disabled
                                                            
                                                    />
                                                    <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                                </div>
                                                <div class="ml-8">
                                                    <InputLabel for="total" value="TOTAL" />
                                                    <TextInput 
                                                        
                                                        type="number" 
                                                        v-model="form.total"
                                                        class="mt-1 bg-gray-200 text-gray-600 sm:rounded-lg"
                                                        disabled
                                                            
                                                    />
                                                    <!--<InputError class="mt-2" :message="form.errors.venta" />-->
                                                </div>
                                                <div class="mt-7 ml-3">
                                                    <Link 
                                                        href="#"
                                                        as="button"
                                                        class="w-8 h-8 hover:bg-green-300  hover:text-green-700 text-green-500 ring-2 focus:ring-set-2 ring-blue-400 rounded-md grid place-content-center">
                                                        <PlusCircleIcon class="w-7 h-7"/>
                                                    </Link>
                                                </div>
                                            </div>    
                                        </div>
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
                                <tr v-for="item in Array.from({length: 20})">
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