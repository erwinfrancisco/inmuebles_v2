<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('apellido_pat');
            $table->string('apellido_mat');
            $table->string('domicilio');
            $table->string('col');
            $table->string('cp');
            $table->integer('municipio_id');
            $table->string('estado');
            $table->string('tel');
            $table->string('ext');
            $table->string('cel');
            $table->string('email');
            $table->text('comentarios');
            $table->string('estatus');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
