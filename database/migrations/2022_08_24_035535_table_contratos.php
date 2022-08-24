<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo_contrato');
            $table->integer('proveedor_id');
            $table->text('descripcion');
            $table->string('uso');
            $table->float('importe');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->date('prorroga');
            $table->string('estatus');
            $table->text('comentarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
