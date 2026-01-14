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
        //
         Schema::create('tentangs', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->string('nama');
            $table->string('tempat_tanggal_lahir');
            $table->string('no_hp');
            $table->string('email');
            $table->text('tempat_tinggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        
        Schema::dropIfExists('tentang');
    }
};
