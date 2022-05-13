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
        Schema::create('_categoria', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unique();
            $table->string('tipo')->unique();
            $table->string('descripcion');
            $table->bigInteger('libro_id')->references('id')->on('libro')->onDelete('cascade')->nullable();

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
        Schema::dropIfExists('_categoria');
    }
};
