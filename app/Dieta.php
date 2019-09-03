<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
	public function cadastrar ($dados)
    {
    	$this->nome = $dados["nome"];
    	$this->objetivo = $dados["objetivo"];
    	$this->save();
    }

    public function editar ($dados)
    {
    	$this->nome = $dados["nome"];
    	$this->objetivo = $dados["objetivo"];
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

    public function alimentos()
	{
    	return $this->belongsToMany(Alimento::class);
	}

    public static function exibirTodos()
    {
        return self::all();
    }
}
