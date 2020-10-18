<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('usuarios');
            $table->text('nome_veiculo');
            $table->string('link',500);
            $table->string('img_url',500);
            $table->string('ano',500);
            $table->string('combustivel',500);
            $table->decimal('quilometragem',8,2);
            $table->string('portas',100);
            $table->string('cambio',100);
            $table->string('cor',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigos');
    }
}
