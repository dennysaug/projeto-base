<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoUsuario extends Model
{
    use SoftDeletes;
    protected $fillable = ['nome', 'texto'];

    public function permissao()
    {
        return $this->belongsToMany(Transacao::class, 'permissao', 'grupo_id', 'transacao_id');
    }
}
