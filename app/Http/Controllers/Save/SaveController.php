<?php

namespace App\Http\Controllers\Save;

use App\Http\Controllers\Controller;

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
        $usuario = User::find($id);
        $usuario->name = $name;
        $usuario->email = $correo;
        $usuario->description = $descripcion;
        if ($foto == '') {
            $usuario->save();
        } else {
            $destino = "images/post/" . $foto;
            copy($ruta, $destino);
            $usuario->image = $destino;
            $usuario->save();
        }

        return view('user.home');
    }

    public function editPhoto(Request $request)
    {
        $id_publication = $request->input('publi_id');
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

        $edit = Publicacion::find($id_publication);
        $edit->user_id = $id;

        $edit->descripcion = $descripcion;
        $edit->nombre_p = $name;
        $edit->precio = $precio;
        $edit->cantidad = $cantidad;
        $edit->contacto = $contacto;
        $edit->dirrecion = $direccion;
        $edit->comment = $comentario;
        if($foto==''){
            $edit->save();
        }else{
            $destino = "images/publicaciones/" . $foto;
            copy($ruta, $destino);
            $edit->imagen = $destino;
            $edit->save();
        }
        return back();
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
        $publicacion->descripcion = $descripcion;
        $publicacion->nombre_p = $name;
        $publicacion->precio = $precio;
        $publicacion->cantidad = $cantidad;
        $publicacion->contacto = $contacto;
        $publicacion->dirrecion = $direccion;
        $publicacion->comment = $comentario;
        $publicacion->imagen = $destino;
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

    public function delete($id)
    {
        Publicacion::destroy($id);
        return back();
    }
}
