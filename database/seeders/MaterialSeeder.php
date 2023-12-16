<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            'bab' => '1',
            'title' => 'Nilai-Nilai Pancasila dalam Kerangka Praktik Penyelenggaraan Pemerintahan Negara',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('materials')->insert([
            'bab' => '2',
            'title' => 'Ketentuan UUD NRI Tahun 1945 dalam Kehidupan Berbangsa dan Bernegara',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('materials')->insert([
            'bab' => '3',
            'title' => 'Kewenangan Lembaga-Lembaga Negara Menurut UUD Negara Republik Indonesia Tahun 1945',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
