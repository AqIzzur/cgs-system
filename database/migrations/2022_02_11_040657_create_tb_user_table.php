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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('full_name');
            $table->string('nick_name');
            $table->string('email')->unique();
            $table->string('school_name');
            $table->string('no_hp');
            $table->string('password');
            $table->string('password_confirmation');
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('status')->default('active');
            $table->string('img_profile')->nullable();
            // $table->rememberToken();
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('tb_user');
    }
};
