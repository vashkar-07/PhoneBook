<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('organization');
            $table->string('about')->nullable()->default(null);
            $table->string('job title')->nullable()->default(null);
            $table->string('departmant')->nullable()->default(null);
            $table->string('imgDir')->nullable()->default(null);
            $table->integer('hierarchy')->default(0);
            $table->boolean('verified')->default(0);
            $table->boolean('applied')->default(0);
            $table->string('mobile')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('linkedin')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('github')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
