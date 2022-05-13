<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    protected $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function index()
    {
        $usuario = $this->usuario->obtenerUsuario(); //retornamos un listado con todos los libros de la bd, para mostrarlos en la vista.
        return view('usuario.lista', ['usuario' => $usuario]);
    }

    public function create()
    {
        return view('usuario.crear'); //redirecciona a una vista donde crearemos un formulario para crear un nuevo libro
    }

    /*public function store(Request $request)                           Este metodo crea un nuevo libro, $request tiene toda la informacion
                                                                         mandada desde un formulario.
    {
        $usuario = new Usuario($request->all());                        all()-> se encarga de cargar los datos al objeto $libro
        $usuario->save();                                               save()-> guardalos datos en la bd 
        return redirect()->action([UsuarioController::class, 'index']); retorna la vista del listado de libros.
    }
    */

    public function show(){
        $usuario = $this->usuario->obtenerUsuario();
        return view('usuario.ver', ['usuario' => $usuario]);
    }

    public function edit($id){
        $usuario = $this->usuario->obtenerUsuario($id);
        return view('usuario.editar', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->fill($request->all());
        $usuario->save();
        return redirect()->action([UsuarioController::class, 'index']);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect()->action([UsuarioController::class, 'index']);
    }
}
