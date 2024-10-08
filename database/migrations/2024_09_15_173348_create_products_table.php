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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del producto
            $table->text('descripcion')->nullable(); // Descripción
            $table->decimal('precio', 8, 2); // Precio con hasta 8 dígitos y 2 decimales
            $table->integer('stock'); // Cantidad disponible
            $table->foreignId('categories_id')->constrained(); // Llave foránea a la tabla categorías
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
