<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';

            $table->string("tipo_inmueble");
            $table->string("nombre");
            $table->string("alias");
            $table->string("num_finca");
            $table->string('sup_terreno');
            $table->string('sup_construccion');
            $table->string('uso');
            $table->text('destino_areas');
            $table->text('estatus');
            $table->text('domicilio');
            $table->string('col');
            $table->bigInteger('cp');
            $table->string('municipio');
            $table->string('fiscalia_distrito');
            $table->double('coord_latitud');
            $table->double('coord_longitud');
            $table->text('referencias');
            $table->string('telefono');
            $table->string('ext');
            $table->string('celular');
            $table->string('email');
            $table->text('observaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
