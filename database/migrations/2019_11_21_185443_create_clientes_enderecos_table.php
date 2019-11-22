<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clientes_id');
            $table->string('cep',10)->nullable();
            $table->string('endereco',50)->nullable();
            $table->string('bairro',30)->nullable();
            $table->string('complemento',30)->nullable();
            $table->string('numero',10)->nullable();
            $table->string('cidade',50)->nullable();
            $table->string('estado',2)->nullable();
            $table->timestamps();

            // Configura as chaves estrangeiras
            $table->foreign('clientes_id')
                ->references('id')->on('clientes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_enderecos');
    }
}
