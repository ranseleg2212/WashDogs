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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id('mascota_id');
            $table->unsignedBigInteger('id_user');
            $table->string('nombre', 25);
            $table->string('raza', 45);
            $table->string('condicion', 150);
            $table->integer('edad');
            $table->string('genero', 10);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
};
