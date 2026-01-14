<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeahliansTable extends Migration
{
    public function up()
    {
        Schema::create('keahlians', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('persentase');
            $table->integer('last_week_percent')->default(0);
            $table->integer('last_month_percent')->default(0);
            $table->string('warna')->nullable(); // Untuk warna progress bar
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keahlians');
    }
}