<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->insert([
        //     [
        //         'name'=>'arman',
        //         'email'=>'arman@gmail.com',
        //         'password'=>Hash::make('123'),
        //         'organization'=>'Khulna University',

        //     ],
        //     [
        //         'name'=>'ruhit',
        //         'email'=>'ruhit@gmail.com',
        //         'password'=>Hash::make('123'),
        //         'organization'=>'Chittagong University',

        //     ],
        //     [
        //         'name'=>'rafi',
        //         'email'=>'rafi@gmail.com',
        //         'password'=>Hash::make('123'),
        //         'organization'=>'Dhaka University',
        //     ]

        // ]);
    }
}
