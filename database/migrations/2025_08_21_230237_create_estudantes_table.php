<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudantes', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 12);
            $table->string('nome_completo', 100);
            $table->string('data_nascimento');
            $table->string('telefone_responsavel');
            $table->foreignId('turma_id');

            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudantes', function (Blueprint $table) {
            $table->dropForeign('estudantes_turma_id_foreign');
            $table->dropColumn('turma_id');
        });

        Schema::dropIfExists('estudantes');
    }
};
