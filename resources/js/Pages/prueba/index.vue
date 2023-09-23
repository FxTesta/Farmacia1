<script setup>
import BuscarProducto from "@/Pages/prueba/BuscarProducto.vue"
import { useForm, Link, router } from '@inertiajs/vue3';
import { ref, computed, onMounted } from "vue";


let producto = ref('');

const recibirProducto = (event) => {
    // La variable 'producto' del componente hijo se recibe aquí
    producto.value = event.detail;
};

onMounted(() => {
    // Escucha el evento personalizado 'enviar-producto' del componente hijo
    window.addEventListener('enviar-producto', recibirProducto);
});

// variable reactiva donde se recupera los campos del producto seleccionado en "v-model" del <combox>
//let producto = ref();

//variable retorna marca que extrae de producto
let marca = computed(() => {
    return producto.value === ""
        ? null
        :

        producto.value?.label;


})

//variable retorna stock que extrae de producto
let stock = computed(() => {
    return producto.value === ""
        ? null
        :

        producto.value?.stock;


})



//PRUEBA PARA AGREGAR DINAMICAMENTE A UNA LISTA LOS PRODUCTOSS

//variables campo del arrayProductos
const cantidad = ref('');
const total = ref('');

const arrayProductos = ref([]); //carga los productos en el array


let form = useForm({
    /*marca: marca,
    stock: stock,
    cantidad: '',
    total: '',*/
    arrayProductos: arrayProductos.value,
});

const agregarProducto = () => {

    if (marca.value !== null && stock.value !== null && cantidad.value !== null && total.value !== null &&
        marca.value !== undefined && stock.value !== undefined && cantidad.value !== undefined && total.value !== undefined &&
        marca.value !== '' && stock.value !== '' && cantidad.value !== '' && total.value !== '') 
        {
        arrayProductos.value.push({ marca: marca.value, stock: stock.value,
        cantidad: cantidad.value, total: total.value});
            
    
      cantidad.value = null;
      total.value = null;
      producto.value = null;
    }
    else {
  console.log('No entro')
}
    
  };

  const eliminarProducto = (index) => {
    arrayProductos.value.splice(index, 1);
  };



function onSubmit() {
    form.post(route('prueba.store'), {
        onSuccess: () => {
            //form.reset();
            arrayProductos.value.splice(0);
            producto.value = null;//resetea la variable reactiva (let producto = ref();) después de guardar los campos en la bd
            //form.cantidad = '',//resetea
              //  form.total = '';//resetea
        },
    });
}

</script>



<template>
    <div class="p-4">
        <div>
            <!--<form @submit.prevent="onSubmit()">-->


                <!--COMBOBOX BUSCAR PRODUCTO-->
                <!--<Combobox :load-options="loadProducto" v-model="producto" />-->
                <BuscarProducto />
                <!--
                <div class="mt-1">
                    <span class="mt-1">{{ producto }} </span>
                    <span class="mt-1">-{{ marca }} -</span>
                    <span class="mt-1">-{{ stock }}- </span>
                    <span class="mt-1">-{{ cantidad }}- </span>
                    <span class="mt-1">-{{ total }} -</span>
                </div>-->
                <div class="mt-1">
                    <span class="mt-1">{{ arrayProductos }}</span>
                </div>
                <div class="mt-1">
                    <span class="mt-1">{{   }}</span>
                </div>

                <!--CAMPO MARCA-->

                <label for="marca">Marca</label>

                <!--SI ES SELECCIONADO UN PRODUCTO MUESTRA ESTE CAMPO-->
                <input v-if="producto" name="marca" id="marca" type="text" v-model="marca"
                    class="border border-gray-300  placeholder-gray-400 rounded-md mt-1 block w-fit bg-gray-200 text-black text-sm shadow-sm"
                    readonly>

                <!--SI --NO-- ES SELECCIONADO UN PRODUCTO MUESTRA ESTE CAMPO-->
                <input v-else id="marca" type="text" placeholder="Seleccionar Producto"
                    class="border pointer-events-none border-gray-300 placeholder-gray-400 rounded-md mt-1 block w-fit bg-gray-200 text-black text-sm shadow-sm"
                    readonly>

                <!--CAMPO STOCK-->

                <label for="stock">Stock</label>

                <!--SI ES SELECCIONADO UN PRODUCTO MUESTRA ESTE CAMPO-->
                <input v-if="producto" name="stock" id="stock" type="text" v-model="stock"
                    class="border border-gray-300 placeholder-gray-400 rounded-md mt-1 block w-fit bg-gray-200 text-black text-sm shadow-sm"
                    readonly>

                <!--SI --NO-- ES SELECCIONADO UN PRODUCTO MUESTRA ESTE CAMPO-->
                <input v-else id="stock" type="text" placeholder="Seleccionar Producto"
                    class="border pointer-events-none border-gray-300 placeholder-gray-400 rounded-md mt-1 block w-fit bg-gray-200 text-black text-sm shadow-sm"
                    readonly>

                <!--CAMPO CANTIDAD-->
                <label for="cantidad">Cantidad</label>
                <input name="cantidad" id="cantidad" type="text" v-model="cantidad"
                    class="border border-gray-300 placeholder-gray-400 rounded-md mt-1 block w-fit bg-gray-100 text-black text-sm shadow-sm">

                <!--CAMPO TOTAL-->
                <label for="total">Total</label>
                <input name="total" id="total" type="text" v-model="total"
                    class="border border-gray-300 placeholder-gray-400 rounded-md mt-1 block w-fit bg-gray-100 text-black text-sm shadow-sm">


                <div class="flex mt-5">
                    <button
                        @click="agregarProducto"
                        class="px-4 py-2 font-medium shadow-sm text-black rounded-md text-sm bg-green-400 hover:bg-green-500 focus:ring-1 focus:ring-offset-1 focus:ring-gray-200 focus:outline-none ">
                        Guardar
                    </button>

                </div>
                <form @submit.prevent="onSubmit()">
                    <div class="flex mt-5">
                        <button
                            class="px-4 py-2 font-medium shadow-sm text-black rounded-md text-sm bg-green-400 hover:bg-green-500 focus:ring-1 focus:ring-offset-1 focus:ring-gray-200 focus:outline-none ">
                            Finalizar
                        </button>

                    </div>
                </form>
                <!--
                <div class="mt-5">
                    <Link
                        class="px-4 py-2 font-medium shadow-sm text-black rounded-md text-sm bg-green-400 hover:bg-green-500 focus:ring-1 focus:ring-offset-1 focus:ring-gray-200 focus:outline-none "
                        v-if="producto" as="button" type="button" href="/crearprueba" method="post" :data="{
                            marca: producto.label,
                            stock: producto.stock,
                            cantidad: form.cantidad,
                            total: form.total,
                        }">Save</Link>
                </div>
                -->

            <!--</form>-->
        </div>
        <div class="px-10 pb-10 pt-2 overflow-y-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-slate-300 text-gray-700 text-left">
                        <th class="px-2">marca</th>
                        <th class="px-2">stock</th>
                        <th class="px-2">cantidad</th>
                        <th class="px-2">total</th>
                        <th class="px-2">acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-400 divide-opacity-30">
                    <tr v-for="(producto, index) in arrayProductos" :key="index">
                        <td>{{producto.marca }}</td>
                        <td>{{producto.stock}}</td>
                        <td>{{producto.cantidad}}</td>
                        <td>{{producto.total}}</td>
                        <td><button @click="eliminarProducto(index)">Remover</button></td>
                    </tr>
                </tbody>

            </table>


        </div>
    </div>
</template>