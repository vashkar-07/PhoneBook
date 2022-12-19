<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subdomains')->insert([
            [
                'organization'=> 'Khulna University',
                'domain_name' => 'Academic',
                'sub_domain_name' => 'Professor',
            ],
            [
                'organization'=> 'Khulna University',
                'domain_name' => 'Student',
                'sub_domain_name' => 'Student',
            ],
        ]);
    }
}
