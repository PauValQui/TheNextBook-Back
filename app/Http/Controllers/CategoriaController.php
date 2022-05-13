<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    protected $categoria;

    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index()
    {
        $categoria = $this->categoria->obtenerCategorias(); //retornamos un listado con todos los libros de la bd, para mostrarlos en la vista.
        return view('categoria.lista', ['categoria' => $categoria]);
    }

    public function create()
    {
        return view('categoria.crear'); //redirecciona a una vista donde crearemos un formulario para crear un nuevo libro
    }

    /*public function store(Request $request) Este metodo crea un nuevo libro, $request tiene toda la informacion mandada desde un formulario.
    {
        $libro = new Libro($request->all());  all()-> se encarga de cargar los datos al objeto $libro
        $libro->save(); save()-> guardalos datos en la bd 
        return redirect()->action([LibroController::class, 'index']); retorna la vista del listado de libros.
    }
    */

    public function showTipo($tipo){
        $categoria = $this->categoria->obtenerCategoriasPorTipo($tipo);
        return view('categoria.ver', ['categoria' => $categoria]);
    }

    public function edit($id){
        $categoria = $this->libro->obtenerCategoriasPorId($id);
        return view('categoria.editar', ['categoria' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->action([CategoriaController::class, 'index']);
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->action([CategoriaController::class, 'index']);
    }
}
