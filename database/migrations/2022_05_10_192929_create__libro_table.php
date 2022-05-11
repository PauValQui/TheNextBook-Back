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
            $table->foreign('categoria')->references('tipo')->on('categoria');
            $table->foreign('autor')->references('id')->on('autor');
            $table->foreign('valoracion')->references('id')->on('valoracion');
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
