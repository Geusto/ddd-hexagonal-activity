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
        Schema::create('carrera_taxi', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('taxi');
            $table->integer('kilometros');
            $table->string('barrioInicio');
            $table->string('barrioLlegada');
            $table->integer('cantidadPasajeros');
            $table->string('taxista');
            $table->integer('precio');
            $table->integer('duracionMinutos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera_taxi');
    }
};
