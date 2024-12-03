<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i<50; $i++){
            DB::table('moives')->insert([
                'title'=> fake()->text(25),
                'poster'=> fake()->imageUrl(),
                'intro'=> fake()->name(),
                'release_date'=> fake()->dateTime,
                'gene_id'=> rand(1,5)
            ]);
        }
    }
}
