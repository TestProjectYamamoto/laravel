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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_uid')->nullable(false);
            $table->integer('post_id')->nullable(false)->unsigned();
            $table->string('sentence')->nullable(false);
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
        Schema::dropIfExists('comments');
    }
};
