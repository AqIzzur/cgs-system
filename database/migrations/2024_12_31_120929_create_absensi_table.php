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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('absent_id'); // Primary key
            $table->unsignedBigInteger('user_id'); // Relasi ke tabel user_accounts
            $table->date('tanggal'); // Tanggal kehadiran atau izin
            $table->enum('status_user', ['hadir', 'izin'])->default('hadir'); // Status kehadiran (hadir atau izin)
            $table->time('login_time')->nullable(); // Waktu login (nullable jika izin)
            $table->string('foto')->nullable(); // Path file foto izin (nullable)
            $table->text('keterangan')->nullable(); // Keterangan izin (nullable)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisikan foreign key secara eksplisit
    $table->foreign('user_id')->references('user_id')->on('tb_user')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
