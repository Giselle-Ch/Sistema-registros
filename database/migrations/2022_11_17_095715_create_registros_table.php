<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_llegada');
            $table->date('fecha_entrega');
            $table->unsignedBigInteger('id_moto');
            $table->foreign('id_moto')->references('id')->on('motos')->onDelete('restrict');
            $table->unsignedBigInteger('id_servicio');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('restrict');
            $table->decimal('precio_servicio_r',10,2);
            $table->unsignedBigInteger('id_repuesto');
            $table->foreign('id_repuesto')->references('id')->on('repuestos')->onDelete('restrict');
            $table->decimal('precio_repuesto_r',10,2);
            $table->smallInteger('unidades');
            $table->decimal('total',10,2);
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
        Schema::dropIfExists('registros');
    }
};
