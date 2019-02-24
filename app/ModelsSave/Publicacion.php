<?php

namespace App\ModelsSave;
use App\ModelsSave\Like;
use App\ModelsSave\Follow;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table="publicaciones";
    protected $fillable=['user_id','imagen','descripcion','nombre_p','precio',
    'cantidad','contacto','dirrecion','comment'];

    public function user() {

        return $this->belongsTo(User::class);
    }

}
