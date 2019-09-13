<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nutricionista;

class Participante extends Model
{
	// private $peso;
	
	// private $altura;

	// private $situacao;

	// private $nivel_atividade;



	protected $fillable = [
        'peso', 'altura', 'situacao', 'nivel_atividade'
    ];
    public function user()
    {
        return $this->morphOne('App\User', 'relacao');
    }

    public function nutricionistas()
    {
        return $this->belongsToMany(Nutricionista::class, "participante_nutricionista");
    }
}
