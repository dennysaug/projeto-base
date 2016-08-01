<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaTransacao extends Model
{
    public function transacao()
    {
        return $this->hasMany(Transacao::class, 'categoria_id');
    }
}
