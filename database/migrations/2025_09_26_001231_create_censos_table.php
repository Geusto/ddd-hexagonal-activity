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
    Schema::create('censos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->date('fecha');
        $table->string('pais');
        $table->string('departamento');
        $table->string('ciudad');
        $table->string('casa');
        $table->integer('numHombres');
        $table->integer('numMujeres');
        $table->integer('numAncianosHombres');
        $table->integer('numAncianasMujeres');
        $table->integer('numNinos');
        $table->integer('numNinas');
        $table->integer('numHabitaciones');
        $table->integer('numCamas');
        $table->boolean('tieneAgua');
        $table->boolean('tieneLuz');
        $table->boolean('tieneAlcantarillado');
        $table->boolean('tieneGas');
        $table->string('tieneOtrosServicios')->nullable();
        $table->string('nombreSensador');
        $table->timestamps(); // created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('censos');
    }
};
