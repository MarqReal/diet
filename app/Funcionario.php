<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{	
	protected $fillable = [
        'registro_funcionario'
    ];
    public function user()
    {
        return $this->morphOne('App\User', 'relacao');
    }
}
