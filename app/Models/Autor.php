<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = "libreria";

    protected $fillable = ['nombre', 'libro_id'];
    protected $hidden = ['id'];

    public function obtenerAutores()
    {
        return Autor::all();
    }

    public function obtenerAutoresPorNombre($nombre)
    {
        return Autor::find($nombre);
    }

    public function obtenerAutoresPorId($id)
    {
        return Autor::find($id);
    }
}
