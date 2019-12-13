<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class CreateAlocacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alocacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('projeto_id');
            $table->unsignedBigInteger('desenvolvedor_id');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->foreign('desenvolvedor_id')->references('id')->on('desenvolvedores');
            $table->integer('horas_semanais');
            $table->timestamps();
            $table->primary(['desenvolvedor_id','projeto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alocacoes');
    }
}
