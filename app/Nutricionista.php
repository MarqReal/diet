<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Nutricionista extends Model
{
    public function cadastrar ($dados)
    {
    	$this->nome = $dados["nome"];
    	$this->segmento = $dados["segmento"];
    	$this->user_name = $dados["user_name"];
    	$this->save();
    }

    public function editar ($dados)
    {
    	$this->nome = $dados["nome"];
    	$this->segmento = $dados["segmento"];
    	$this->user_name = $dados["user_name"];
    	$this->update();
    }

    public function excluir ()
    {
    	$this->delete();
    }

    public static function consultar ($id)
    {
    	return self::find($id);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "participante_nutricionista");
    }

    public static function exibirTodos()
    {
        return self::all();
    }
}
