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
        Schema::create('unregistered', function (Blueprint $table) {
            $table->id('id');
            $table->string('mailadress')->unique()->nullable(false);
            $table->dateTime('issue_time')->nullable(false)->useCurrent();
            $table->dateTime('update_time')->nullable($value = true)->useCurrentOnUpdate();
            $table->tinyInteger('valid')->nullable(false)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unregistered');
    }
};
