<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('departments')->insert([
            [
                'organization'=> 'Khulna University',
                'department' => 'Architecture',
                'hierarchy' => 1,
            ],
            [
                'organization'=> 'Khulna University',
                'department' => 'CSE',
                'hierarchy' => 2,
            ],
        ]);
    }
}
