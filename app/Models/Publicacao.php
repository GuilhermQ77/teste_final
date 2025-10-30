<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = "publicacao";
    protected $primaryKey = 'id_publicacao';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['foto','titulo_prato','locals','cidade','like','dislike','empresa_id'];
    public $timestamps = false;

     public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
