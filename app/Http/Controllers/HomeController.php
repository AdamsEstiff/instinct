<?php

namespace App\Http\Controllers;

use App\ModelsSave\Publicacion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }

    public function welcome()
    {
        $posts = Publicacion::all();
        return view('welcome', [
            "publicaciones" => $posts
        ]);
    }
}
