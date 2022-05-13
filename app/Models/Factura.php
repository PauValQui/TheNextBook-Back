<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = "libreria";

    protected $fillable = ['precioTotal', 'fechaCompra', 'libro_id', 'usuario_id'];
    protected $hidden = ['id'];

    public function obtenerFacturas()
    {
        return Factura::all();
    }

    public function obtenerFacturasPorUsuario($usuario_id)
    {
        return Factura::find($usuario_id);
    }

    public function obtenerFacturasPorFecha($fechaCompra)
    {
        return Factura::find($fechaCompra);
    }

    public function obtenerFacturasPorId($id)
    {
        return Factura::find($id);
    }
}
