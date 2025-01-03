<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        DB::table('users')->insert([
           // Admin
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=> hash::make('111'),
                //'password'=>bcrypt('admin'),//bcrypt is used to hash and store passwords
                'role'=>'admin',
                'national_id'=>'40958443',
                'status'=>'active',  
            ],
            //Agent
            [
                'name'=>'Agent',
                'email'=>'Agent@gmail.com',
                'password'=> hash::make('111'),
                'role'=>'Agent',
                'national_id'=>'40958223',
                'status'=>'active',   
            ],
          //`  User
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=> hash::make('111'),
                'role'=>'user',
                'national_id'=>'40958333',
                'status'=>'active',   
            ],
        ])    ;
        

    }
    
}
