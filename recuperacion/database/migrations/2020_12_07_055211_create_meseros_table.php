<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeserosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('meseros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->integer('edad');
            $table->string('correo');
            $table->foreignId('mesa_id')->references('id')->on('mesas')->comment('La mesa que se asigna al mesero');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('meseros');
        Schema::enableForeignKeyConstraints();

        
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mesas');
        Schema::enableForeignKeyConstraints();
    }
}
