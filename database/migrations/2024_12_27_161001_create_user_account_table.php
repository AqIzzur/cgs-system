<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('full_name');
            $table->string('nick_name');
            $table->string('email')->unique();
            $table->string('school_name');
            $table->string('password');
            $table->string('password_confirmation');
            $table->enum('role', ['user', 'admin'])->default('user');
            // $table->rememberToken();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account');
    }
};
