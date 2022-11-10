<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccaos', function (Blueprint $table) {
            $table->id();
            $table->string('data_inicio',20);
            $table->string('data_fim',20);
            $table->string('estado',20);
            $table->string('preco',20);
            $table->foreignId('utilizador_id')->constrained();
            $table->foreignId('filme_id')->constrained();
            $table->foreignId('sala_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seccaos');
    }
}
