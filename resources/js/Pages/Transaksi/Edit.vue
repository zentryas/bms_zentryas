<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
  transaksi: {
    type: Object,
    default: null,
  },
});

const form = useForm({
  nama_penjual: props.transaksi.nama_penjual,
  nama_pembeli: props.transaksi.nama_pembeli,
  harga: props.transaksi.harga,
});

const submit = () => {
  const formData = new FormData();
  
  formData.append('nama_penjual', form.nama_penjual);
  formData.append('nama_pembeli', form.nama_pembeli);
  formData.append('harga', form.harga);
  
  form.post(`/transaksi-update/${props.transaksi.id}`, { data: formData });
};

</script>

<template>
    <Head title="Edit Transaksi" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Transaksi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link href="/transaksi">
                    <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg> Back
                    </button>
                </Link>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">                        
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="nama_penjual" class="block text-gray-700 text-sm font-bold mb-2">Nama Penjual:</label>
                                <input id="nama_penjual" type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Enter nama_penjual" v-model="form.nama_penjual" />
                                <small v-if="form.errors.nama_penjual" class="text-red-600">{{ form.errors.nama_penjual }}</small>
                            </div>
                            <div class="mb-4">
                                <label for="nama_pembeli" class="block text-gray-700 text-sm font-bold mb-2">Nama Pembeli:</label>
                                <input id="nama_pembeli" type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Enter nama_pembeli" v-model="form.nama_pembeli" />
                                <small v-if="form.errors.nama_pembeli" class="text-red-600">{{ form.errors.nama_pembeli }}</small>
                            </div>
                            <div class="mb-4">
                                <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
                                <input id="harga" type="text" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Enter harga" v-model="form.harga" />
                                <small v-if="form.errors.harga" class="text-red-600">{{ form.errors.harga }}</small>
                            </div>
                            
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 text-white">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
