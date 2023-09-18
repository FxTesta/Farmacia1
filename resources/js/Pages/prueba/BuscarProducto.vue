<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import { Popover, PopoverButton, PopoverPanel, PopoverOverlay } from '@headlessui/vue';
import {SearchIcon} from "@heroicons/vue/outline";
import Combobox from "@/Pages/prueba/Combobox copy.vue"
import { ref } from "vue";


let producto = ref();

const enviarProducto = (close) => {

    close();

  // Emite un evento personalizado para enviar la variable al componente padre
  const event = new CustomEvent('enviar-producto', { detail: producto.value });
  window.dispatchEvent(event);

//reseteo cuadro de busqueda al seleccionar producto
  producto.value = null;
};

function loadProducto(query, setOptions) {
    fetch("http://127.0.0.1:8000/searchproduct?query=" + query)
        .then(response => response.json())
        .then(results => {
            setOptions(
                results.map(producto => {
                    return {
                        value: producto.id,
                        label: producto.marca,
                        codigo: producto.codigo,
                        stock: producto.stock,
                    };
                })
            );
        });
}

</script>

<template>
    <Popover v-slot="{ open }" class="">
                                <PopoverButton
                                    :class="open ? 'bg-blue-400 text-blue-600' : ''"
                                    class="w-8 h-8 hover:bg-blue-300 hover:text-blue-700 text-blue-400 ring-2 focus:ring-set-2 ring-gray-400 rounded-full grid place-content-center"
                                >
                                    <SearchIcon  class="w-6 h-6"/>
                                </PopoverButton>
                                <PopoverOverlay class="z-10 fixed inset-0 bg-black opacity-60" />

                                <transition
                                    enter-active-class="transition duration-200 ease-out"
                                    enter-from-class="translate-y-1 opacity-0"
                                    enter-to-class="translate-y-0 opacity-100"
                                    leave-active-class="transition duration-150 ease-in"
                                    leave-from-class="translate-y-0 opacity-100"
                                    leave-to-class="translate-y-1 opacity-0"
                                >
                                    <PopoverPanel
                                    :focus="true"
                                    v-slot="{close}"
                                    class="absolute left-1/2 z-10 w-screen max-w-lg -translate-x-1/2 top-2 transform px-4 sm:px-0 "
                                    >
                                        <div
                                            class="p-3 bg-cyan-100 border border-gray-100 overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                                        >

                                            <!--<label class="block text-sm text-gray-800 mb-2 font-bold" 
                                                for="stock">Buscar Producto: </label>
                                            
                                            <div>
                                                <input 
                                                    name="stock"
                                                    id="stock"
                                                    type="text" 
                                                    v-model="form.stock"
                                                    class="border border-gray-300 placeholder-gray-400 rounded-md mt-1 block w-full bg-white text-black text-sm shadow-sm"                                                    
                                                    placeholder="cantidad">                                                    
                                            </div>-->

                                            <span class="block text-sm text-gray-800 mb-2 font-bold" 
                                                >Buscar Producto: </span>
                                            <Combobox   
                                                :load-options="loadProducto" 
                                                v-model="producto"
                                            />
                                            
                                            <div class="flex justify-end mt-5">
                                                <button 
                                                    @click="enviarProducto(close)"
                                                    class="px-4 py-2 font-medium shadow-sm text-black rounded-md text-sm bg-green-400 hover:bg-green-500 focus:ring-1 focus:ring-offset-1 focus:ring-gray-200 focus:outline-none "
                                                    >Seleccionar Producto
                                                </button>
                                                
                                            </div>
                                        
                                        </div>
                                    </PopoverPanel>
                                </transition>
                            </Popover>
</template>