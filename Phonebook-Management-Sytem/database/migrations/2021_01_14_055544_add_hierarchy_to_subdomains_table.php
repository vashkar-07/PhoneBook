<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHierarchyToSubdomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subdomains', function (Blueprint $table) {
            //
            $table->integer('hierarchy')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subdomains', function (Blueprint $table) {
            //
            $table->dropColumn('hierarchy');
        });
    }
}
