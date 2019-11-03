<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento', function (Blueprint $table) {
            $table->bigIncrements('id_establecimiento');
            $table->unsignedBigInteger('testablecimiento_id');
            $table->foreign('testablecimiento_id')->references('id_testablecimiento')->on('tipo_establecimiento');
            $table->unsignedBigInteger('ciudad_id');
            $table->foreign('ciudad_id')->references('id_ciudad')->on('ciudad');
            $table->string('nombre_Establecimeinto',150);
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
        Schema::dropIfExists('establecimiento_models');
    }
}
