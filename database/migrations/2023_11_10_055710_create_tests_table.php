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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('uid')->unique()->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('login_id')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->dateTime('issue_time')->nullable(false)->useCurrent();
            $table->dateTime('update_time')->nullable($value = true)->useCurrentOnUpdate();
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
};
