<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('allPower')->default('allPower')->nullable();
            $table->string('typePower')->nullable();
            $table->string('userPower')->nullable();
            $table->string('delegatePower')->nullable();
            $table->string('rankPower')->nullable();
            $table->string('continuePower')->nullable();
            $table->string('standingPower')->nullable();
            $table->string('notePower')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
