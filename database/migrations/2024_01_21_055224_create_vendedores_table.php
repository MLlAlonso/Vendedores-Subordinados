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
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60)->nullable(false);
            $table->string('apellidoPaterno', 40)->nullable(false);
            $table->string('apellidoMaterno', 40)->nullable(false);
            $table->string('domicilio', 100)->nullable(false);
            $table->string('celular', 15)->nullable(false);
            $table->string('telefonoDeCasa', 15)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->integer('nivel')->nullable(false)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
