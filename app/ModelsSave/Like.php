<?php

namespace App\ModelsSave;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table="like";
    protected $fillable=['id', 'user_id', 'post_id','dis'];
}
