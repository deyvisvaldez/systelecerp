<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionSubTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_sub_trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cotizaciontrabajo_id')->unsigned();
            $table->string('item')->required();
            $table->string('descripcion')->required();
            $table->string('unidad')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('costo_material')->nullable();
            $table->string('tipo_moneda')->nullable();
            $table->double('costo_mo_montaje')->nullable();
            $table->double('costo_mo_programacion')->nullable();
            $table->double('costo_mo_tablero')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cotizaciontrabajo_id')
              ->references('id')->on('cotizacion_trabajos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion_sub_trabajos');
    }
}
