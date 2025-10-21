<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $table = "usuario.csv";
    protected $fillable = ['nome','email','nickname','senha','foto','created_at','update_at'];
    public $timestamps = false;
}
