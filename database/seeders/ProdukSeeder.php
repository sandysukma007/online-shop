<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
 
            // insert data ke table pegawai menggunakan Faker
          DB::table('produks')->insert([
              'foto_produk' => $faker->name,
              'nama_produk' => $faker->jobTitle,
              'harga_produk' => $faker->numberBetween($min = 1000, $max = 9000),
             
          ]);

      }
    }
}
