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
        Schema::create('Provincia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_provincia');
            $table->string('capital_provincia');
            $table->text('descripcion_provincia');
            $table->string('poblacion_provincia');
            $table->string('superficie_provincia');
            $table->string('latitud_provincia');
            $table->string('longitud_provincia');
            $table->unsignedBigInteger('id_region');
            $table->foreign('id_region')->references('id')->on('Region');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Provincia');
    }
};
