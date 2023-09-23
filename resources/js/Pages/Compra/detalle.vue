<script setup>
//import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import prueba from '@/Layouts/prueba.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { XIcon, SearchIcon, PlusCircleIcon, SaveIcon } from "@heroicons/vue/outline";
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Combobox from "@/Pages/Compra/Combobox copy.vue"
import BuscarProducto from "@/Pages/Compra/BuscarProducto.vue"
import { ref, computed, onMounted } from "vue";


//para obtener el usuario logueado, name y id
const props = defineProps({
    user: Object,
});

//variable que recibe los datos del proveedor
const proveedor = ref();

//variable que va a recibir los detalles del producto seleccionado
let producto = ref('');

//evento recibe el producto buscado del componente "BuscarProducto"
const recibirProducto = (event) => {
    // La variable 'producto' del componente hijo se recibe aquí
    producto.value = event.detail;
};

onMounted(() => {
    // Escucha el evento personalizado 'enviar-producto' del componente hijo
    window.addEventListener('enviar-producto', recibirProducto);
});

//variables campo del arrayProductos
const precio = ref('');
const cantidad = ref('');

//calcula el "importe" por producto
const total = computed(() => {
    const precioNumerico = parseFloat(precio.value);
    const cantidadNumerica = parseFloat(cantidad.value);

    // Verificar si los valores son numéricos antes de calcular el producto
    if (!isNaN(precioNumerico) && !isNaN(cantidadNumerica)) {
        return precioNumerico * cantidadNumerica;
    } else {
        return 0; // Otra opción sería retornar null o un mensaje de error
    }
});

//Array donde se guardan la lista de productos comprados
const arrayProductos = ref([]);

// Función para calcular la suma de la propiedad 'total' de los objetos en arrayProductos
const calcularSumaTotal = () => {
    return arrayProductos.value.reduce((total, producto) => total + producto.total, 0);
};

//variable retorna suma del campo total para obtener "P. TOTAL"
let preciototal = computed(() => {
    return calcularSumaTotal();


})

//variable retorna id que extrae de producto
let productoid = computed(() => {
    return producto.value === ""
        ? null
        :

        producto.value?.value;


})

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

//variable retorna codigo de barra que extrae de producto
let codigobarra = computed(() => {
    return producto.value === ""
        ? null
        :

        producto.value?.codigo;


})






//funcion que busca el proveedor y retorna los datos
function loadProveedor(query, setOptions) {
    fetch("http://127.0.0.1:8000/proveedores?query=" + query)
        .then(response => response.json())
        .then(results => {
            setOptions(
                results.map(proveedores => {
                    return {
                        value: proveedores.id,
                        label: proveedores.empresa,
                    };
                })
            );
        });
}





//let form = useForm({
//   /*marca: marca,
//   stock: stock,
//   cantidad: '',
//   total: '',*/
//   arrayProductos: arrayProductos.value,
//});






//función que obtiene el día de la fecha
function mindate() {
    return new Date().toISOString().split('T')[0]
}

//función que guarda la comra realizada en la base de datos
function onSubmit() {
    form.post(route('prueba.store'), {
        onSuccess: () => {
            //form.reset();
            arrayProductos.value.splice(0); //resetea el array después de guardar en la BD
            producto.value = null;//resetea la variable reactiva (let producto = ref();) después de guardar los campos en la bd
            //form.cantidad = '',//resetea
            //  form.total = '';//resetea
        },
    });
}

//cuenta lo contenido en arrayProductos para verificar si es nulo
const contarProductos = () => {
    return arrayProductos.value.length;
};



let form = useForm({
    usuario: props.user.name,
    codigo: props.user.id,
    proveedor: '', //estirar el valor de el combobox
    nrofactura: '',
    fechafactura: mindate(),
    total: preciototal,
    arrayProductos: arrayProductos.value, //array con la lista de productos comprados

});

// Función para formatear el número con punto decimal
const formatearNumero = (numero) => {
    return numero.toLocaleString();
};

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
                                        <Combobox :load-options="loadProveedor" v-model="proveedor" />
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
                            <div class="flex justify-end pr-3">
                                <div class=" w-fit border-2 border-gray-500">
                                    <span class="text-black font-bold text-xl pr-3">P. TOTAL:</span>
                                    <span class="text-red-500 font-bold text-xl pr-3">{{ formatearNumero(form.total)
                                    }}</span>
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
                                    <tr v-for="(producto, index) in arrayProductos" :key="index">
                                        <td class="text-gray-700 py-4"> {{ producto.productoid }} </td>
                                        <td class="text-gray-700 py-4">{{ producto.codigobarra }}</td>
                                        <td class="text-gray-700 py-4 uppercase">{{ producto.marca }}</td>
                                        <td class="text-gray-700 py-4">{{ formatearNumero(producto.precio) }}</td>
                                        <td class="text-gray-700 py-4">{{ producto.cantidad }}</td>
                                        <td class="text-gray-700 py-4">{{ formatearNumero(producto.total) }}</td>
                                        <td class="py-4">
                                            <div class="inline-flex">
                                                <div>
                                                    <button @click="eliminarProducto(index)"
                                                        class="w-8 h-8 t hover:text-red-700 text-red-500 rounded-md grid place-content-center">
                                                        <XIcon class="w-6 h-6" />
                                                    </button>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <!--div se muestra en caso que no hayan registros-->
                                    <div class="py-4 font-bold" v-if="!contarProductos()">
                                        SIN REGISTROS
                                    </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </prueba>
</template>