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
            $table->datetime('data_lancamento');
            $table->string('duracao',20);
            $table->string('imagem',255);
            $table->string('descricao',200);
            $table->string('actor',30);
            $table->string('trailer',255);
            $table->string('estado',30);
            $table->foreignId('user_id')->constrained();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
