
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
    image: '',
});

const submit = () => {
    form.post(route('producto.store'));
};

function mindate(){
	return new Date().toISOString().split('T')[0]
}

 

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
                            <div class="mt-4 ">
                                <InputLabel for="categoria" value="Categoria" class="text-gray-600"/>
                                
                                <select type="text" v-model="form.categoria" class="mt-1 block w-full bg-gray-200 text-gray-600 sm:rounded-lg" autofocus>
                                    <option disabled value="">Seleccione una categoria</option>
                                    <option>A - Tracto alimentario y metabolismo</option>
                                    <option>B - Sangre y órganos hematopoyéticos</option>
                                    <option>C - Sistema cardiovascular</option>
                                    <option>D - Dermatológicos</option>
                                    <option>G - Sistema genitourinario y hormonas sexuales</option>
                                    <option>H - Preparados hormonales sistémicos, excluyendo hormonas sexuales e insulinas</option>
                                    <option>J - Antiinfecciosos para uso sistémico</option>
                                    <option>L - Antineoplásicos e inmunomoduladores</option>
                                    <option>M - Sistema musculoesquelético</option>
                                    <option>N - Sistema nervioso</option>
                                    <option>P - Antiparasitarios, insecticidas y repelentes</option>
                                    <option>R - Sistema respiratorio</option>
                                    <option>S - Órganos de los sentidos</option>
                                    <option>V - Varios</option>
                                    <option>W - Cosméticos</option>
                                    <option>X - Alimentos y dietéticos</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.categoria" />
                            </div>
                            <div class="mt-4 ">
                                <InputLabel for="descripcion" value="Descripcion" class="text-gray-600"/>

                                <TextInput
                                    id="descripcion"
                                    type="text"
                                    class="mt-1 block w-full bg-gray-200 text-gray-600"
                                    v-model="form.descripcion"
                                    required                                    
                                    autocomplete="descripcion"
                                />
                                
                                <InputError class="mt-2" :message="form.errors.descripcion" />

                            </div>
                            <div class="mt-4 inline-flex space-x-10">

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
                                    <option disabled value="">Seleccione el tipo</option>
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
                                    
                                    autocomplete="laboratorio"
                                />

                                
                            </div>

                            <div class="mt-4">
                                <InputLabel for="regsanitario" value="Reg. Sanitario" class="text-gray-600 " />

                                <TextInput
                                    id="regsanitario"
                                    type="text"
                                    class="mt-1 w-full bg-gray-200 text-gray-600"
                                    v-model="form.regsanitario"
                                    required
                                    autocomplete="regsanitario"
                                />
                            </div>
                            
                            <div class="mt-4 inline-flex space-x-10">
                                <div >
                                    
                                    <InputLabel for="vencimiento" value="Vencimiento" class="text-gray-600"/>
                                
                                    <div>
                                        <input    
                                            :min="mindate()"                                             
                                            v-model="form.vencimiento"
                                            type="date"
                                            name="vencimiento"
                                            id="vencimiento"
                                            class="mt-1 w-full bg-gray-200 text-gray-600 rounded-md"
                                            
                                        >                                
                                    </div>

                                </div>

                                <div >                                    
                                    <InputLabel for="alerta" value="Alerta de vencimiento:" class="text-gray-600"/>
                                    <div>
                                        <input 
                                            :min="mindate()"   
                                            v-model="form.alerta"
                                            type="date"
                                            name="alerta"
                                            id="alerta"
                                            class="mt-1 w-full bg-gray-200 text-gray-600 rounded-md"
                                        >
                                    </div>
                                </div> 
                            </div>
                            <p v-if="form.alerta>form.vencimiento" class="text-red-600">*La fecha de alerta no puede ser mayor que la fecha de vencimiento</p>
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

                            <div class="mt-4 inline-flex space-x-10">
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

                            <div class="mt-4 inline-flex space-x-10">
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
                            <div class="mt-2">
                                    <InputLabel for="image" value="Agregar foto" class="text-gray-600"/>
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    <Input
                                        id="image"
                                        type="file"
                                        class=" mt-2 bg-gray-200 text-gray-600 rounded-md "
                                        v-model="form.image"
                                        required
                                        autocomplete="image"
                                    />

                                    
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
