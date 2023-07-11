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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopping_cart_id')->nullable();
            $table->unsignedBigInteger('id_user')->default(0);
            $table->double('total')->default(0);
            $table->string('status', 255)->default('Registrado');
            $table->timestamps();
            $table->string('token', 50);
            $table->string('comentario', 100)->nullable();
            $table->datetime('fecha');
            $table->unsignedBigInteger('mascota_id')->nullable();

            $table->unique('shopping_cart_id');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mascota_id')->references('mascota_id')->on('mascotas');
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
