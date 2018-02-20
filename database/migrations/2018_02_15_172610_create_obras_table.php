<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('numero')->required();
            $table->string('obra')->required();
            $table->string('descripcion')->nullable();
            $table->double('costo')->nullable();
            $table->string('tipo_moneda')->nullable();
            $table->string('forma_pago')->nullable();
            $table->date('fecha_limite')->nullable();
            $table->string('documentacion')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cliente_id')
              ->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras');
    }
}
