<?php

namespace App\Http\Controllers\User;
use App\User;
use App\ModelsSave\Publicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getPublication()
    {
        return view('user.Publication');
    }

    public function getPhoto($post_id)
    {
        $post = Publicacion::find($post_id);
        return view('user.Photo', [
            "publicacion" => $post

        ]);
    }

    public function getInformation()
    {
        return view('user.ProfileInformation');
    }

    public function getUser($user_id)
    {
        $user = User::find($user_id);

        return view('user.userProfile', [
            "user" => $user
        ]);
    }


    public function save()
    {
        return 'store';
    }
}
