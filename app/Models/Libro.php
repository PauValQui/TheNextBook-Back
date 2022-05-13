<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = "libreria";

    protected $fillable = ['titulo', 'sinopsis', 'precio', 'categoria_id', 'autor_id', 'valoracion_id'];
    protected $hidden = ['id'];

    public function obtenerLibros()
    {
        return Libro::all();
    }

    public function obtenerLibrosPorTitulo($titulo)
    {
        return Libro::find($titulo);
    }

    public function obtenerLibrosPorAutor($autor_id)
    {
        return Libro::find($autor_id);
    }

    public function obtenerLibrosPorCategoria($categoria_id)
    {
        return Libro::find($categoria_id);
    }
}
