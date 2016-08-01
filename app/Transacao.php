<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    public function categoria()
    {
        return $this->belongsTo(CategoriaTransacao::class, 'categoria_id');
    }
}
