<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    
        <nav class="shrink-0 flex justify-between bg-gray-800  px-4 py-3">
            <a class="text-2xl font-black tracking-tight text-gray-100"> Log In </a>
            <div class="flex items-center">
                                                    
                <a class="text-sm text-white font-medium px-3 py-2 rounded-md">Inicie Sesión </a>

            </div>
        </nav>

        <div class="fixed h-full w-full flex flex-col items-center sm:pt-3 bg-gray-900">
            <div>
                <ApplicationLogo class="w-52 h-20 fill-current text-gray-500" />
            </div>

            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-800 shadow-md sm:rounded-lg"
            >
                <slot />
            </div>
        </div>
    
</template>
