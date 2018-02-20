<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('obra_id')->unsigned();
            $table->string('numero')->required();
            $table->string('descripcion')->nullable();
            $table->string('usuario')->required();
            $table->string('estado')->nullable();
            $table->double('costo_material')->nullable();
            $table->double('costo_mo_montaje')->nullable();
            $table->double('costo_mo_programacion')->nullable();
            $table->double('costo_mo_tableros')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('obra_id')
              ->references('id')->on('obras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
