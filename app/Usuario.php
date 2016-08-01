<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['grupo_usuario_id', 'nome', 'email', 'password', 'cpf'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grupo_usuario()
    {
        return $this->belongsTo(GrupoUsuario::class);
    }

//    public function setPasswordAttribute($senha)
//    {
//        if($senha) {
//            $this->attributes['password'] =  bcrypt($senha);
//        }
//    }


}
