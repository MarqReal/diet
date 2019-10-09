<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alimento;
use App\User;
use Auth;
use App\Peso;
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
    public function cafeManha ()
    {
        return $this->alimentos()->wherePivot('refeicao', 'cafeManha')->withPivot('refeicao', 'quantidade');
    }
    public function cafeTarde ()
    {
        return $this->alimentos()->wherePivot('refeicao', 'cafeTarde')->withPivot('refeicao', 'quantidade');
    }
    public function almoco ()
    {
        return $this->alimentos()->wherePivot('refeicao', 'almoco')->withPivot('refeicao', 'quantidade');
    }
    public function jantar ()
    {
        return $this->alimentos()->wherePivot('refeicao', 'jantar')->withPivot('refeicao', 'quantidade');
    }
    public static function exibirTodos()
    {
        return self::all();
    }
    public function users()
    {
        return $this->belongsToMany(User::class, "user_dieta");
    }
    public static function exibirBibliotecaDietas($user)
    {
        return $user->dietas()->withPivot('ativo', 'quantidade_participacao', 'dt_inicio', 'dt_termino')->orderBy('dt_termino', 'desc')->get(); 
    }

    public static function consultarGraficoProgressao($dados)
    {
        $retorno = null;
        $meses["1"] = "Jan";
        $meses["2"] = "Fev";
        $meses["3"] = "Mar";
        $meses["4"] = "Abr";
        $meses["5"] = "Mai";
        $meses["6"] = "Jun";
        $meses["7"] = "Jul";
        $meses["8"] = "Ago";
        $meses["9"] = "Set";
        $meses["10"] = "Out";
        $meses["11"] = "Nov";
        $meses["12"] = "Dez";
        $pesos = Peso::where([ 
                                ['user_id', '=', Auth::user()->id],
                                ['dieta_id', '=', $dados['dieta_id']],
                                ['quantidade_participacao', '=', $dados['quantidade_participacao']]
                            ])->orderBy('dt_pesagem', 'asc')->get();
        if (count($pesos) > 0) {
            foreach ($pesos as $peso) {
                $data = explode("-", $peso->dt_pesagem);
                $retorno['data'][] = $data[2]."/".$meses[$data[1]]; 
                $retorno['peso'][] = $peso->peso; 
            }
        }
        return $retorno;
    }

}
