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
        Schema::create('prateleiras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colecao_id')->constrained('colecoes', 'id', 'prat_colecao_id_fk')->onDelete('cascade')->onUpdate('restrict');
            $table->string('nome', 255);
            $table->text('descricao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prateleiras');
    }
};
