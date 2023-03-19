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
            $table->timestamp('data_inicio');
            $table->timestamp('data_fim')->nullable();
            $table->string('estado',20);
            $table->string('preco',20);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('filme_id')->constrained();
            $table->foreignId('sala_id')->constrained();
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
        Schema::dropIfExists('seccaos');
    }
}
