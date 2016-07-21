<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model
{
    protected $fillable = ['nome'];

    public function permissao()
    {
        return $this->belongsToMany(Transacao::class, 'permissao', 'grupo_id', 'transacao_id');
    }
}
