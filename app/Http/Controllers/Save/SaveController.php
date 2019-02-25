<?php

namespace App\Http\Controllers\Save;

use App\Http\Controllers\Controller;

use App\ModelsSave\Like;
use App\ModelsSave\Follow;
use App\ModelsSave\Publicacion;

use Illuminate\Http\Request;
use App\User;

class SaveController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $correo = $request->input('email');
        $descripcion = $request->input('descripcion');
        $foto = $_FILES['image']['name'];
        $ruta = $_FILES['image']['tmp_name'];
        $destino = "images/post/" . $foto;
        copy($ruta, $destino);
        $usuario = User::find($id);
        $usuario->name = $name;
        $usuario->email = $correo;
        $usuario->image = $destino;
        $usuario->description = $descripcion;
        $usuario->save();
        //una vez ya esta la lista agregar todo lo q falta

        return view('user.home');
    }

    public function addPublication(Request $request)
    {
        $id = $request->input('user_id');
        $name = $request->input('nombre_p');
        $cantidad = $request->input('cantidad');
        $precio = $request->input('precio');
        $contacto = $request->input('contacto');
        $comentario = $request->input('comment');
        $direccion = $request->input('dirrecion');
        $descripcion = $request->input('descripcion');
        $foto = $_FILES['image']['name'];
        $ruta = $_FILES['image']['tmp_name'];
        $destino = "images/publicaciones/" . $foto;
        copy($ruta, $destino);
        $publicacion = new Publicacion();
        $publicacion->user_id = $id;
        $publicacion->imagen = $destino;
        $publicacion->descripcion = $descripcion;
        $publicacion->nombre_p=$name;
        $publicacion->precio=$precio;
        $publicacion->cantidad=$cantidad;
        $publicacion->contacto=$contacto;
        $publicacion->dirrecion=$direccion;
        $publicacion->comment = $comentario;
        $publicacion->save();
        return view('user.home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function Search(Request $request)
    {
        $search = $request->input('buscar');
        $users = [];
        $comments = [];
        if ($search != "") {
            $users = User::where('name', 'Like', "%$search%")->get();
            $comments = Publicacion::where('comment', 'Like', "%$search%")->get();
        }
        return response()->json([
            "users" => $users,
            "comments" => $comments
        ]);
    }
}
