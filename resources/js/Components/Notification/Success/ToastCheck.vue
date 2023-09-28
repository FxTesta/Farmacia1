<script setup>
import ToastCheckItem from "@/Components/Notification/Success/ToastCheckItem.vue"
import { onUnmounted } from "vue";
import { router } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import toast from '@/Stores/toast';

//usePage() función para hacer uso de los request de inertia en share (HandleInertiaRequests, share)


//guarda en "removeFinishEventListener" los message
let removeFinishEventListener = router.on('finish', () => {

    if(usePage().props.toast){
        toast.add({
            message: usePage().props.toast,
        });
    }
});

//desmonta lo que contiene la variable removeFinishEventListener
onUnmounted(() => removeFinishEventListener());

//función para remover los notificaciones "toast"
function remove(index) {

    toast.remove(index);
    
}
</script>

<template>
    <!-- si llega una notificación "toast" se muestra el componente Toastlistitem v-if="page.props.value.toast"-->
    <TransitionGroup
        tag="div"
        enter-from-class="translate-x-full opacity-0"
        enter-active-class="duration-500"
        leave-active-class="duration-500"
        leave-to-class="translate-x-full opacity-0"
        class="fixed top-4 right-4 z-50 space-y-4 w-full max-w-xs">
        <ToastCheckItem
            v-for="(item, index) in toast.items"
            :key="item.key"
            :message="item.message"
            :duration="3500"
            @remove="remove(index)"
            />
    </TransitionGroup>
</template>