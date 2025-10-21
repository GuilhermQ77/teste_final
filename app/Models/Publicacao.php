<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = "publicacao.csv";
    protected $fillable = ['foto','titulo_prato','locals','cidade'];
    public $timestamps = false;
}
