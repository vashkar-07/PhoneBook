<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('domains')->insert([
            [
                'organization'=> 'Khulna University',
                'domain_name' => 'Academic'
            ],
            [
                'organization'=> 'Khulna University',
                'domain_name' => 'Student'
            ],
        ]);
    }
}
