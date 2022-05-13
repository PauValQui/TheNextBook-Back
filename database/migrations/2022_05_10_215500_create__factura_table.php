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
        Schema::create('_factura', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->decimal('precioTotal');
            $table->date('fechaCompra');

            $table->bigInteger('libro_id')->references('id')->on('libro')->onDelete('cascade')->nullable();
            $table->bigInteger('usuario_id')->references('id')->on('usuario')->onDelete('cascade')->nullable();

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
        Schema::dropIfExists('_factura');
    }
};
