<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    protected $libro;

    public function __construct(Libro $libro)
    {
        $this->libro = $libro;
    }

    public function index()
    {
        $libro = $this->libro->obtenerLibros(); //retornamos un listado con todos los libros de la bd, para mostrarlos en la vista.
        return view('libro.lista', ['libro' => $libro]);
    }

    public function create()
    {
        return view('libro.crear'); //redirecciona a una vista donde crearemos un formulario para crear un nuevo libro
    }

    /*public function store(Request $request) Este metodo crea un nuevo libro, $request tiene toda la informacion mandada desde un formulario.
    {
        $libro = new Libro($request->all());  all()-> se encarga de cargar los datos al objeto $libro
        $libro->save(); save()-> guardalos datos en la bd 
        return redirect()->action([LibroController::class, 'index']); retorna la vista del listado de libros.
    }
    */

    public function showTitulo($titulo){
        $libro = $this->libro->obtenerLibrosPorTitulo($titulo);
        return view('libro.ver', ['libro' => $libro]);
    }

    public function showAutor($autor){
        $libro = $this->libro->obtenerLibrosPorTitulo($autor);
        return view('libro.ver', ['libro' => $libro]);
    }

    public function showCategoria($categoria){
        $libro = $this->libro->obtenerLibrosPorTitulo($categoria);
        return view('libro.ver', ['libro' => $libro]);
    }

    public function editTitulo($titulo){
        $libro = $this->libro->obtenerLibrosPorTitulo($titulo);
        return view('libro.editar', ['libro' => $libro]);
    }

    public function edit($id){
        $libro = $this->libro->obtenerLibrosPorTitulo($id);
        return view('libro.editar', ['libro' => $libro]);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);
        $libro->fill($request->all());
        $libro->save();
        return redirect()->action([LibroController::class, 'index']);
    }

    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        return redirect()->action([LibroController::class, 'index']);
    }
}
