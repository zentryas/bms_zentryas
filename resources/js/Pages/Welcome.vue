<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
  totalTransaksi: Number,
});

</script>

<template>
    <Head title="Total Transaksi" />

    <GuestLayout>

        <div class="py-12">
            <div class="grid justify-items-stretch gap-6 lg:grid-cols-1 lg:gap-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-8 w-full md:w-1/2 mx-auto">
                    <h3 class="text-center pt-5 text-5xl text-gray-900 mb-5">Test Fullstack Developer - ACI BMS 2025</h3>
                    <hr><br>
                    <p>Menampilkan total transaksi hari ini</p>
                    <h3>Total: {{ totalTransaksi }}</h3>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
