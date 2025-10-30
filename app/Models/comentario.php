<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
      protected $table = "comentario";
    protected $fillable = ['comentario','publicacao_id','user_id'];
    public $timestamps = false;

      public function user(){
        return $this->belongsTo(User::class);
    }

    public function publicacao(){
        return $this->belongsTo(Publicacao::class);
    }
}

