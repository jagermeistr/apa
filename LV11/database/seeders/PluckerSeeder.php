<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PluckerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plucker_details')->insert([
            //Plucker
            [
                'name'=>'Johnstone Mathenge',
                'farm'=>'Matheke Farm',
                'Phone'=>'0722484151',
                'weight collected'=>'50Kgs',
            ],
           
        ])    ;
        
    }
}
