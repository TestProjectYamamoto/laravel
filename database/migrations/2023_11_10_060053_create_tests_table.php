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
        Schema::create('unregistereds', function (Blueprint $table) {
            $table->id('id');
            $table->string('mailadress')->unique()->nullable(false);
            $table->dateTime('created_at')->nullable(false)->useCurrent();
            $table->dateTime('updated_at')->nullable($value = true)->useCurrentOnUpdate();
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
        Schema::dropIfExists('unregistereds');
    }
};
