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
        Schema::create('_libro', function (Blueprint $table) {
            $table->id()->autoincrement()->unique();
            $table->string('titulo',100);
            $table->text('sinopsis');
            $table->decimal('precio',$precision=8, $scale=2);
            $table->bigInteger('categoria_id')->references('id')->on('categoria')->onDelete('cascade')->nullable();
            $table->bigInteger('autor_id')->references('id')->on('autor')->onDelete('cascade')->nullable();
            $table->bigInteger('valoracion_id')->references('id')->on('valoracion')->onDelete('cascade')->nullable();

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
        Schema::dropIfExists('_libro');
    }
};
