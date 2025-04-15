<script setup>
    import { onMounted, defineEmits } from 'vue';
    import { usePage } from '@inertiajs/vue3';

    const page = usePage();

    const props = defineProps({
        message: String,
        duration: {
            type: Number,
            default: 2000
        }
    });

    const emit = defineEmits(['remove']);

    onMounted(() => {
        setTimeout(() => {
            emit("remove");
        }, props.duration);
    });

    const getToastStyle = () => {
        switch (page.props.toast) {
            case 'error':
                return {
                    icon: 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z',
                    bgColor: 'bg-red-100',
                    textColor: 'text-red-500',
                    borderColor: 'border-red-500',
                };
            case 'warning':
                return {
                    icon: 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z',
                    bgColor: 'bg-yellow-100',
                    textColor: 'text-yellow-500',
                    borderColor: 'border-yellow-500',
                };
            default:
                return {
                    icon: 'M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z', // Success icon
                    bgColor: 'bg-green-100',
                    textColor: 'text-green-500',
                    borderColor: 'border-green-500',
                };
        }
    };
</script>
<template>
    <div
        :class="['flex items-center p-4 rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800', 
            getToastStyle().bgColor, 
            getToastStyle().borderColor]"
        role="alert">

        <div
            :class="['inline-flex items-center justify-center shrink-0 w-8 h-8 rounded-lg', 
            getToastStyle().textColor, 
            getToastStyle().bgColor]">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path :d="getToastStyle().icon"/>
            </svg>
            <span class="sr-only">Icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ props.message }}</div>
        <button 
            @click="emit('remove')"
            type="button" 
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" 
            aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</template>