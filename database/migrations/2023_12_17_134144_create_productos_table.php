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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('autor');
            $table->string('imagen');
            $table->integer('precio');
            $table->integer('stock');
            $table->bigInteger('id_genero');
            $table->bigInteger('id_promocion')->nullable();

            $table->foreign('id_genero')->references('id')->on('generos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_promocion')->references('id')->on('promociones')->nullOnDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
