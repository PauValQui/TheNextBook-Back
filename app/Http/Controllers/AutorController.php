<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    protected $autor;

    public function __construct(Autor $autor)
    {
        $this->autor = $autor;
    }

    public function index()
    {
        $autor = $this->autor->obtenerAutores(); //retornamos un listado con todos los libros de la bd, para mostrarlos en la vista.
        return view('autor.lista', ['autor' => $autor]);
    }

    public function create()
    {
        return view('autor.crear'); //redirecciona a una vista donde crearemos un formulario para crear un nuevo libro
    }

    /*public function store(Request $request) Este metodo crea un nuevo libro, $request tiene toda la informacion mandada desde un formulario.
    {
        $autor = new Autor($request->all());  all()-> se encarga de cargar los datos al objeto $libro
        $autor->save(); save()-> guardalos datos en la bd 
        return redirect()->action([AutorController::class, 'index']); retorna la vista del listado de libros.
    }
    */

    public function show($nombre){
        $autor = $this->libro->obtenerAutoresPorNombre($nombre);
        return view('autor.ver', ['autor' => $autor]);
    }

    public function edit($id){
        $autor = $this->libro->obteneAutoresPorId($id);
        return view('autor.editar', ['autor' => $autor]);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::find($id);
        $autor->fill($request->all());
        $autor->save();
        return redirect()->action([AutorController::class, 'index']);
    }

    public function destroy($id)
    {
        $autor = Autor::find($id);
        $autor->delete();
        return redirect()->action([AutoroController::class, 'index']);
    }
}
