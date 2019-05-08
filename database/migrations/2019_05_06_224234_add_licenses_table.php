<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('modelo',['CLOUD','SITE']);
            $table->enum('tipo',['DEMO','SALES']);
            $table->enum('tiempo',['15 days','1 month','2 month','3 month','6 month','12 month','24 month','36 month']);
            $table->boolean('status');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('tamano_total');
            $table->integer('licencia_total');
            $table->integer('tamano_restante');
            $table->integer('licencia_restante');
            $table->String('serial');
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
        Schema::dropIfExists('licenses');
    }
}
