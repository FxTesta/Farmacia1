<script setup>
import Combobox from "@/Pages/Compra/Combobox copy.vue"
import {ref} from "vue";

/*
const options = [
  { value: 1, label: 'Wade Cooper' },
  { value: 2, label: 'Arlene Mccoy' },
  { value: 3, label: 'Devon Webb' },
  { value: 4, label: 'Tom Cook' },
  { value: 5, label: 'Tanya Fox' },
  { value: 6, label: 'Hellen Schmidt' },
]; */

const proveedores = ref();

function loadProveedor(query, setOptions) {
  fetch("http://127.0.0.1:8000/proveedores?query=" + query)
  .then(response => response.json())
  .then(results => {
    setOptions(
      results.map( proveedores => {
        return{
        value: proveedores.id,
        label: proveedores.empresa,
        };
      })
    );
  });
}

</script>

<template>
    <Combobox 
      :load-options="loadProveedor" 
      v-model="proveedores"/>
</template>