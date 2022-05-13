<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaController extends Controller
{
    protected $factura;

    public function __construct(Factura $factura)
    {
        $this->factura = $factura;
    }

    public function index()
    {
        $factura = $this->factura->obtenerFactura(); //retornamos un listado con todos los libros de la bd, para mostrarlos en la vista.
        return view('factura.lista', ['factura' => $factura]);
    }

    public function create()
    {
        return view('factura.crear'); //redirecciona a una vista donde crearemos un formulario para crear un nuevo libro
    }

    /*public function store(Request $request) Este metodo crea un nuevo libro, $request tiene toda la informacion mandada desde un formulario.
    {
        $factura = new Factura($request->all());  all()-> se encarga de cargar los datos al objeto $libro
        $factura->save(); save()-> guardalos datos en la bd 
        return redirect()->action([FacturaController::class, 'index']); retorna la vista del listado de libros.
    }
    */

    public function showUsuarios($usuario_id){
        $factura = $this->factura->obtenerFacturasPorUsuario($usuario_id);
        return view('factura.ver', ['factura' => $factura]);
    }

    public function showAutor($fecha){
        $factura = $this->libro->obtenerFacturasPorFecha($fecha);
        return view('factura.ver', ['factura' => $factura]);
    }

    public function edit($id){
        $factura = $this->factura->obtenerFacturaPorId($id);
        return view('factura.editar', ['factura' => $factura]);
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);
        $factura->fill($request->all());
        $factura->save();
        return redirect()->action([FacturaController::class, 'index']);
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        return redirect()->action([FacturaController::class, 'index']);
    }
}
