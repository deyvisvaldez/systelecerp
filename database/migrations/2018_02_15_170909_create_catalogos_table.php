<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proveedor_id')->unsigned();   
            $table->string('numero_almacen')->required();
            $table->string('codigo')->required();
            $table->string('categoria')->nullable();
            $table->string('descripcion')->required();
            $table->string('descripcion_adicional')->nullable();
            $table->string('costo_lista')->required();
            $table->string('costo_neto')->nullable();
            $table->string('modeda')->required();
            $table->string('iva')->nullable();
            $table->timestamps();

            $table->foreign('proveedor_id')
              ->references('id')->on('proveedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogos');
    }
}
