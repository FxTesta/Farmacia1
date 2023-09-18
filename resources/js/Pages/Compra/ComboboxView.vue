<script setup>
import Combobox from "@/Pages/Compra/Combobox.vue"

/*const options = [
  { value: 1, label: 'Wade Cooper' },
  { value: 2, label: 'Arlene Mccoy' },
  { value: 3, label: 'Devon Webb' },
  { value: 4, label: 'Tom Cook' },
  { value: 5, label: 'Tanya Fox' },
  { value: 6, label: 'Hellen Schmidt' },
]; */

const props = defineProps({

    proveedor: Object,

});


</script>

<template>
    <Combobox :options="proveedor"/>
</template>