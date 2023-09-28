<script setup>
import ToastErrorItem from "@/Components/Notification/Error/ToastErrorItem.vue"
import { onUnmounted, computed } from "vue";
import { router } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import error from '@/Stores/error';

//usePage() función para hacer uso de los request de inertia en share (HandleInertiaRequests, share)


//guarda en "removeFinishEventListener" los message
let removeFinishEventListener1 = router.on('finish', () => {
    if(usePage().props.error){
        error.add1({
            message1: usePage().props.error,
        });
    }
});

//desmonta lo que contiene la variable removeFinishEventListener
onUnmounted(() => removeFinishEventListener1());

//función para remover los notificaciones "error"
function remove1(index1) {

    error.remove1(index1);
    
}

</script>

<template>
    <TransitionGroup
        tag="div"
        enter-from-class="translate-x-full opacity-0"
        enter-active-class="duration-500"
        leave-active-class="duration-500"
        leave-to-class="translate-x-full opacity-0"
        class="fixed top-4 right-4 z-50 space-y-4 w-full max-w-xs">
        <ToastErrorItem
            v-for="(item, index1) in error.items1"
            :key="item.key1"
            :message1="item.message1"
            :duration1="3500"
            @remove1="remove1(index1)"
            />
    </TransitionGroup>
</template>