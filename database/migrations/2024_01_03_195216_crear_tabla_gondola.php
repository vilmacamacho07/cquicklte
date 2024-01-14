<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaGondola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gondola', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->string('placas_truck',10)->unique();
             $table->string('conductor_names');
             $table->string('conductor_apellidos');
             $table->integer('mt3');
             $table->string('status')->default('Disponible');
             //$table->integer('documentos');
             $table->string('name_admin_flete');
             $table->string('foto', 100)->nullable();
             //$table->string('foto_curp', 100)->nullable();
             $table->timestamps();
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_spanish_ci';
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gondola');
    }
};
