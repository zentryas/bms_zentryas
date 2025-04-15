<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Halaman Utama" />

    <GuestLayout>

        <div class="py-12">
            <div class="grid justify-items-stretch gap-6 lg:grid-cols-1 lg:gap-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-8 w-full md:w-1/2 mx-auto">
                    <h1 class="text-center pt-5 text-5xl text-gray-900">Test Fullstack Developer - ACI BMS 2025</h1>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
