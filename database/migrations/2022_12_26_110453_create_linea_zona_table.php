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
        Schema::create('linea_zona', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('linea_id');
            $table->foreign('linea_id')->references('id')->on('lineas')->cascadeOnDelete();
            $table->unsignedBigInteger('zona_id');
            $table->foreign('zona_id')->references('id')->on('zonas')->cascadeOnDelete();
            $table->unique(['linea_id','zona_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_zona');
    }
};
