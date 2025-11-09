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
        Schema::create('carros', function (Blueprint $table) {
        $table->id();
        $table->string('url_foto1')->nullable();
        $table->string('url_foto2')->nullable();
        $table->string('url_foto3')->nullable(); 
        $table->foreignId('marca_id')->constrained('marcas')->onDelete('cascade');
        $table->foreignId('modelo_id')->constrained('modelos')->onDelete('cascade');
        $table->foreignId('cor_id')->constrained('cores')->onDelete('cascade');          
        $table->string('ano_fabricacao')->nullable();     
        $table->integer('quilometragem')->nullable();     
        $table->decimal('valor_total', 10, 2);         
        $table->text('detalhes')->nullable();     
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
