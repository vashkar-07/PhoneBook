<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jobs')->insert([
            [
                'organization'=> 'Khulna University',
                'job_title' => 'Pofessor',
                'hierarchy' => 1,
            ],
            [
                'organization'=> 'Khulna University',
                'job_title' => 'Associate Pofessor',
                'hierarchy' => 2,
            ],
        ]);
    }
}
