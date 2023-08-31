<script setup>
import {Link} from '@inertiajs/vue3';

const props = defineProps({
    links: Array
});
</script>

<template>
    <div>
        <template v-for="link in links" >
            <Link
                class="px-1"
                                
                v-if="link.url"
                :href="link.url" 
                v-html="link.label" 
                :class="{ 'font-bold' : link.active}"
            />
            <span v-else v-html="link.label" class="text-gray-500"></span>
        </template>
    </div>
</template>