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
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 200);
            $table->foreignId('estudante_id');
            $table->foreignId('punicao_id');

            $table->foreign('estudante_id')->references('id')->on('estudantes');
            $table->foreign('punicao_id')->references('id')->on('punicoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ocorrencias', function (Blueprint $table) {
            $table->dropForeign('ocorrencias_estudante_id_foreign');
            $table->dropColumn('estudante_id');

            $table->dropForeign('ocorrencias_punicao_id_foreign');
            $table->dropColumn('punicao_id');
        });

        Schema::dropIfExists('ocorrencias');
    }
};
