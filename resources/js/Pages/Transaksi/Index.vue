<script setup>

import { onMounted } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import $ from 'jquery';

import DeleteButton from '@/Components/SweetAlert2/DeleteButton.vue';

defineProps({
  transaksi: {
    type: Array,
    default: () => [],
  },
  components: {
    DeleteButton,
  },
});

onMounted(() => {
  $.fn.dataTable.ext.search.push(function(settings, data) {
    const min = document.getElementById('min-date').value;
    const max = document.getElementById('max-date').value;
    const createdAt = data[2]; // Column index for created_at

    if (!min && !max) return true;

    const date = new Date(createdAt);
    const minDate = min ? new Date(min) : null;
    const maxDate = max ? new Date(max) : null;

    if ((minDate === null || date >= minDate) &&
        (maxDate === null || date <= maxDate)) {
      return true;
    }
    return false;
  });

  const table = $('#transaksi-table').DataTable({
    scrollX: true,
  });

  $('#min-date, #max-date').on('change', function () {
    table.draw();
  });
});

function formatNumber(value) {
  if (!value) return '0';
  return new Intl.NumberFormat('id-ID').format(value);
}

</script>

<template>
    <Head title="Data Transaksi" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Transaksi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="transaksi/create">
                          <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Create New Transaksi
                          </button>
                        </Link>                       
                        <div class="relative overflow-x-auto sm:rounded-lg">
                          <div class="mb-4 flex justify-center">
                              <div class="flex gap-4">
                                <div>
                                  <label for="min-date" class="block text-sm font-medium text-gray-700 text-center">Start Date</label>
                                  <input type="date" id="min-date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-center" />
                                </div>
                                <div>
                                  <label for="max-date" class="block text-sm font-medium text-gray-700 text-center">End Date</label>
                                  <input type="date" id="max-date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-center" />
                                </div>
                              </div>
                            </div>
                            <table id="transaksi-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">No.</th>
                                        <th scope="col" class="px-6 py-3">Kode Transaksi</th>
                                        <th scope="col" class="px-6 py-3">Tanggal</th>
                                        <th scope="col" class="px-6 py-3">Nama Penjual</th>
                                        <th scope="col" class="px-6 py-3">Nama Pembeli</th>
                                        <th scope="col" class="px-6 py-3">Harga</th>
                                        <th scope="col" class="px-6 py-3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row, index) in transaksi" :key="row.id">
                                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ index + 1 }}.
                                      </th>
                                      <td class="px-6 py-4">{{ row.kode_transaksi }}</td>
                                      <td class="px-6 py-4">{{ new Date(row.created_at).toISOString().split('T')[0] }}</td>
                                      <td class="px-6 py-4">{{ row.nama_penjual }}</td>
                                      <td class="px-6 py-4">{{ row.nama_pembeli }}</td>
                                      <td class="px-6 py-4">Rp. {{ formatNumber(row.harga) }}</td>
                                      <td class="px-6 py-4">

                                        <Link :href="`transaksi/${row.id}/edit`">
                                          <button class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-200 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg> Edit
                                          </button>
                                        </Link>
                                          
                                        <DeleteButton 
                                          :item-id="row.id" 
                                          :item-title="row.kode_transaksi" 
                                          :delete-url="`/transaksi/${row.id}`"/>
                                      </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
