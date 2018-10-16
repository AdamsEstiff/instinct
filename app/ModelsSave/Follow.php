<?php

namespace App\ModelsSave;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table="follow";
    protected $fillable=['id','follower_id', 'author_id','un'];
}
