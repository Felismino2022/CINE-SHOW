<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',20);
            $table->string('data_lancamento',20);
            $table->string('duracao',20);
            $table->string('imagem',200);
            $table->string('descricao',200);
            $table->string('actor',30);
            $table->string('trailer',30);
            $table->string('estado',30);
            $table->foreignId('utilizador_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmes');
    }
}
