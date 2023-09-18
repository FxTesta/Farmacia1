<template>
    <div>
      <h1>Lista de Productos</h1>
      <div>
        <input v-model="nombre" placeholder="Nombre del Producto">
        <input v-model="precio" placeholder="Precio del Producto">
        <button @click="agregarProducto">Agregar</button>
      </div>
      <span>{{ productos }}</span>
      <ul>
        <li v-for="(producto, index) in productos" :key="index">
          {{ producto.nombre }} - ${{ producto.precio }}
          <button @click="eliminarProducto(index)">Remover</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const nombre = ref('');
  const precio = ref('');
  const productos = ref([]);
  
  const agregarProducto = () => {
    if (nombre.value.trim() !== '' && precio.value.trim() !== '') {
      productos.value.push({ nombre: nombre.value, precio: parseFloat(precio.value) });
      nombre.value = '';
      precio.value = '';
    }
  };
  
  const eliminarProducto = (index) => {
    productos.value.splice(index, 1);
  };
  

  </script>
  