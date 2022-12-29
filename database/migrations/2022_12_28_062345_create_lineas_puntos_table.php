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
        Schema::create('lineas_puntos', function (Blueprint $table) {
            $table->unsignedBigInteger('punto_id');
            $table->foreign('punto_id')->references('id')->on('puntos')->cascadeOnDelete();
            $table->unsignedBigInteger('linea_id');
            $table->foreign('linea_id')->references('id')->on('lineas')->cascadeOnDelete();
            $table->unique(['punto_id','linea_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lineas_puntos');
    }
};
