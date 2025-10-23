<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
     protected $table = "empresa";
    protected $fillable = ['nome','logo','data_criacao','data_atualizacao'];
    public $timestamps = false;
}
