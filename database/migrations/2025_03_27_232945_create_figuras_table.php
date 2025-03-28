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
        Schema::create('figuras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categorias', 'id', 'fig_categoria_id_fk')->onDelete('cascade')->onUpdate('restrict');
            $table->foreignId('prateleira_id')->constrained('prateleiras', 'id', 'fig_prateleira_id_fk')->onDelete('cascade')->onUpdate('restrict');
            $table->string('nome', 255);
            $table->date('lancamento');
            $table->date('recebimento')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('foto', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('figuras');
    }
};
