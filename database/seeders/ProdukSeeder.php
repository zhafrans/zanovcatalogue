<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        DB::table('produk')->insert([
            [
                'nama' => 'A551',
                'kategori' => 'sepatu',
                'bahan' => 'kulit',
                'hargacash' => '175000',
                'hargakredit' => '225000',
                'gambar' => 'sepatu1.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'A312',
                'kategori' => 'sepatu',
                'bahan' => 'kulit',
                'hargacash' => '180000',
                'hargakredit' => '250000',
                'gambar' => 'sepatu2.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'R01',
                'kategori' => 'sepatu',
                'bahan' => 'non-kulit',
                'hargacash' => '185000',
                'hargakredit' => '180000',
                'gambar' => 'sepatu3.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Z01',
                'kategori' => 'sandal',
                'bahan' => 'non-kulit',
                'hargacash' => '125000',
                'hargakredit' => '175000',
                'gambar' => 'sandal4.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
