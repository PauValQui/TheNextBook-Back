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
            $table->foreign('IdLibro')->references('id')->on('libro');
            $table->foreign('IdUsuario')->references('id')->on('users');
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
