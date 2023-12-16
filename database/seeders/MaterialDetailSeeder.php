<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaterialDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('material_details')->insert([
            'material_content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque esse nemo, quidem maiores soluta architecto ea, consequatur inventore delectus eligendi reprehenderit aspernatur vitae? Laboriosam debitis odit autem iste dolorem maxime?',
            'material_id' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        
        DB::table('material_details')->insert([
            'material_content' => 'Harum veniam sunt esse, Lorem ipsum dolor sit amet consectetur adipisicing elit. aperiam commodi ipsum eum quaerat! Neque dolorum aliquam, beatae eaque provident non, adipisci officiis hic dolorem minima id.',
            'material_id' => 2,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('material_details')->insert([
            'material_content' => 'Ducimus delectus molestias omnis deleniti ipsa necessitatibus? Lorem ipsum dolor sit amet consectetur adipisicing elit.  Adipisci fugiat ut totam tempore veritatis dignissimos nemo excepturi, aliquid, facilis, voluptatem expedita earum vitae?',
            'material_id' => 3,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
