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
        Schema::create('asset_data', function (Blueprint $table) {
            $table->id('asset_id');
            $table->string('name_asset');
            $table->string('file_asset');
            $table->integer('kategori_asset');
            $table->string('type_file');
            $table->string('akses');
            // $table->string('akses');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('asset_data');
    }
};
