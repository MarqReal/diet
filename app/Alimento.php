<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    public function cadastrar ($dados)
    {
    	$this->nome = $dados["nome"];
    	$this->descricao = $dados["descricao"];
    	$this->unidade_medida = $dados["unidade_medida"];
        $this->porcao = $dados["porcao"];
    	$this->tipo_medida = $dados["tipo_medida"];
    	$this->mes = $dados["mes"];
    	$this->carboidrato = $dados["carboidrato"];
    	$this->proteina = $dados["proteina"];
    	$this->lipideos = $dados["lipideos"];
    	$this->fibra_alimentar = $dados["fibra_alimentar"];
    	$this->calorias = $dados["calorias"];
    	$this->save();
    }

    public function editar ($dados)
    {
    	$this->nome = $dados["nome"];
    	$this->descricao = $dados["descricao"];
    	$this->unidade_medida = $dados["unidade_medida"];
        $this->porcao = $dados["porcao"];
    	$this->tipo_medida = $dados["tipo_medida"];
    	$this->mes = $dados["mes"];
    	$this->carboidrato = $dados["carboidrato"];
    	$this->proteina = $dados["proteina"];
    	$this->lipideos = $dados["lipideos"];
    	$this->fibra_alimentar = $dados["fibra_alimentar"];
    	$this->calorias = $dados["calorias"];
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

    public static function exibirDestaqueMes()
    {
        return self::where("mes", date('m'))->get();
    }
    public function dietas()
    {
     return $this->belongsToMany(Dieta::class, "dieta_alimento");
    }
    public static function exibirTodos()
    {
        return self::all();
    }
}
