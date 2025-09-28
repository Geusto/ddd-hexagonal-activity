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

// Cantidades de personas
$table->integer('num_hombres')->default(0);
$table->integer('num_mujeres')->default(0);
$table->integer('num_ancianos_hombres')->default(0);
$table->integer('num_ancianas_mujeres')->default(0);
$table->integer('num_ninos')->default(0);
$table->integer('num_ninas')->default(0);

// Vivienda
$table->integer('num_habitaciones')->default(0);
$table->integer('num_camas')->default(0);

// Servicios básicos
$table->boolean('tiene_agua')->default(false);
$table->boolean('tiene_luz')->default(false);
$table->boolean('tiene_alcantarillado')->default(false);
$table->boolean('tiene_gas')->default(false);
$table->boolean('tiene_otros_servicios')->default(false);

$table->string('nombre_sensador')->nullable();


            $table->timestamps();
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
