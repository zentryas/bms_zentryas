<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class createTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('transaksi')->insert([
                'kode_transaksi' => 'TRX-' . strtoupper($faker->bothify('??###')),
                'nama_pembeli'   => $faker->name(),
                'nama_penjual'   => $faker->name(),
                'harga'          => $faker->numberBetween(10000, 1000000),
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
