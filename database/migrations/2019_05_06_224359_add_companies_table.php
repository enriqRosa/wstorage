<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('alias')->unique();
            $table->string('rfc',13)->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('logo');
            $table->integer('license_id')->unsigned();

            $table->foreign('license_id')->references('id')->on('licenses')->onDelete('cascade');
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
        Schema::dropIfExists('companies');
    }
}
