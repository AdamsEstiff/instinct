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
    public function like(Request $request)
    {
        $user_id = $request->input('user_id');
        $photo_id = $request->input('photo_id');

        $like1 = Like::where('user_id', '=', $user_id)->first();
        $like2 = Like::where('post_id', '=', $photo_id)->get();
        $contador= like::all()->count();
        if($request->ajax()){
            if ($like1 == true && $like2 == true) {
                $like1->delete();
                $post = Publicacion::find($photo_id);
                $contador= Like::where('post_id','=' , $photo_id) ->count();
                return response()->json([
                    'total'=>"Like: ".$contador,
                    'message'=>'Like'

                ]);

            } else {
                $add = new Like();
                $add->user_id = $user_id;
                $add->post_id = $photo_id;
                $add->save();
                $post = Publicacion::find($photo_id);
                $contador= Like::where('post_id','=' , $photo_id) ->count();
                return response()->json([
                    'total'=>"Like: ".$contador,
                    'message'=>'DisLike'

                ]);

            }
        }


    }

    public function follow(Request $request)
    {
        $follower_id = $request->input('follower_id');
        $user_id = $request->input('author_id');
        $photo_id = $request->input('photo_id');
        $follow1 = Follow::where('follower_id', '=', $follower_id)->first();
        $follow2 = Follow::where('author_id', '=', $user_id)->get();

        if($request->ajax()){
            if ($follow1 == true && $follow2 == true) {
                $follow1->delete();
                $contador = Follow::where('author_id','=',$user_id)->count();
                return response()->json([
                    'total'=>"Follow: ".$contador,
                    'message'=>'Follow  '
                ]);

            } else {
                $add = new Follow();
                $add->follower_id = $follower_id;
                $add->author_id = $user_id;
                $add->save();
                $contador = Follow::where('author_id','=',$user_id)->count();
                return response()->json([
                    'total'=>"Follow: ".$contador,
                    'message'=>'UnFollow'
                ]);
            }

        }

    }

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
