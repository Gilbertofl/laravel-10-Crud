<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Contenido extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('contenidos')->insert([
            'name'=> 'filipino',
            'note'=> 'Hacer un desayuno alas 10 am',
            'year'=> '2021'
        ]);
    }
}
