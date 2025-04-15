<script setup>
    import { onUnmounted, ref } from 'vue';
    import ToastListItem from '@/Components/Toaster/ToastListItem.vue';
    import { Inertia } from '@inertiajs/inertia';
    import { usePage } from '@inertiajs/vue3';
    import toast from '@/Stores/toast';

    const page = usePage();

    let removeFinishEventListener = Inertia.on("finish", () => {
        if (page.props.message) {
            toast.add({
                message: page.props.message
            });
        }
    });

    onUnmounted(() => removeFinishEventListener());

    function remove(index) {
        toast.remove(index);
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
        <ToastListItem
            v-for="(item, index) in toast.items"
            :key="item.key"
            :message="item.message"
            :duration="1500"
            @remove="remove(index)"/>
    </TransitionGroup>
</template>  