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
        Schema::create('jerarquia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idReclutador')->nullable(true)->comment("Id del usuario responsable de agregar un nuevo subordinado a la jerarquía, si el reclutador fue el vendedor este registro puede quedar vacío");
            $table->unsignedBigInteger('idSubordinado')->nullable(false)->comment("Id del nuevo subordinado");
            $table->unsignedBigInteger('idVendedor')->nullable(true)->comment("Id del vendedor, el primero de la jerarquía a la que pertenece el subordinado");
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('idReclutador')->references('id')->on('subordinado');
            $table->foreign('idSubordinado')->references('id')->on('subordinado');
            $table->foreign('idVendedor')->references('id')->on('vendedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jerarquia');
    }
};
