<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->bigIncrements('id_empleado');
            $table->unsignedBigInteger('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id_establecimiento')->on('establecimiento');
            $table->string('nombre', 150);
            $table->string('apellido', 150);
            $table->tinyInteger('telefono');
            $table->string('direccion', 150);
            $table->integer('documento');
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
        Schema::dropIfExists('empleado_models');
    }
}
