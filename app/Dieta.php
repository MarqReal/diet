<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alimento;
class Dieta extends Model
{
	public function cadastrar ($dados)
    {
    	$this->nome = $dados["nome"];
    	$this->objetivo = $dados["objetivo"];
    	$this->save();
    	
    	foreach ($dados['cafeManha'] as $key => $alimento_id) {
    		$alimento = Alimento::find($alimento_id);
    		$this->alimentos()->save($alimento, ["refeicao" => "cafeManha", "quantidade" => $dados['qtdCafeManha'][$alimento->nome]]);
    	}
    	foreach ($dados['cafeTarde'] as $key => $alimento_id) {
    		$alimento = Alimento::find($alimento_id);
    		$this->alimentos()->save($alimento, ["refeicao" => "cafeTarde", "quantidade" => $dados['qtdCafeTarde'][$alimento->nome]]);
    	}
    	foreach ($dados['almoco'] as $key => $alimento_id) {
    		$alimento = Alimento::find($alimento_id);
    		$this->alimentos()->save($alimento, ["refeicao" => "almoco", "quantidade" => $dados['qtdAlmoco'][$alimento->nome]]);
    	}
    	foreach ($dados['jantar'] as $key => $alimento_id) {
    		$alimento = Alimento::find($alimento_id);
    		$this->alimentos()->save($alimento, ["refeicao" => "jantar", "quantidade" => $dados['qtdJantar'][$alimento->nome]]);
    	}

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
    	return $this->belongsToMany(Alimento::class, "dieta_alimento");
	}

    public static function exibirTodos()
    {
        return self::all();
    }
}
