<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class avaliacao extends Model
{
    protected $table = "avaliacao";
    protected $fillable = ['likes','deslike','publicacao_id'];
    public $timestamps = false;
}

