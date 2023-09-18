<script setup>
  import { ref } from 'vue';
  
  const searchQuery = ref('');
  const products = ref([
    { id: 1, name: 'Producto 1', stock: 10, price: 20.99 },
    { id: 2, name: 'Producto 2', stock: 5, price: 15.99 },
    // Agrega más productos aquí
  ]);
  const searchResults = ref([]);
  const selectedProduct = ref({});
  
  const searchProducts = () => {
    // Filtra los productos que coinciden con la búsqueda y actualiza searchResults.
    searchResults.value = products.value.filter(product =>
      product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
  };
  
  const selectProduct = (product) => {
    // Cuando se selecciona un producto, copia sus datos a selectedProduct.
    selectedProduct.value = { ...product };
  };
  </script>


<template>
    <div>
      <input v-model="searchQuery" @input="searchProducts" placeholder="Buscar producto">
      <ul>
        <li v-for="product in searchResults" @click="selectProduct(product)">
          {{ product.name }}
        </li>
      </ul>
      <div>
        <label for="productName">Nombre:</label>
        <input v-model="selectedProduct.name" id="productName" readonly>
      </div>
      <div>
        <label for="productStock">Stock:</label>
        <input v-model="selectedProduct.stock" id="productStock" readonly>
      </div>
      <div>
        <label for="productPrice">Precio:</label>
        <input v-model="selectedProduct.price" id="productPrice" readonly>
      </div>
    </div>
  </template>