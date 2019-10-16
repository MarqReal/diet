<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Participante;
use App\Dieta;
use App\Peso;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_usuario', 'email', 'password', 'dt_nascimento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // private $id;
    // private $nome_usuario;
    // private $email;
    // private $password;
    // private $dt_nascimento;

    public function registrarLogin($req) {
            $date = str_replace("/", "-", $req['dt_nascimento']);
            $date = date("Y/m/d", strtotime($date));
            $this->nome_usuario = $req["nome_usuario"];
            $this->email = $req["email"];
            $this->password = bcrypt($req["senha"]);
            $this->dt_nascimento = $date;
            $participante = new Participante();
            $participante->peso = $req['peso'];
            $participante->altura = $req['altura'];
            $participante->situacao = $req['objetivo'];;
            $participante->nivel_atividade = $req['nivel_atividade'];
            $participante->save();
            $participante->user()->save($this);
            $participante->nutricionistas()->sync($req['nutricionistas']);
        //dd($participante->user);
        // $this->save();
        // $this->relacao()->associate($participante);
    }

    public function editar($req) {
            $date = str_replace("/", "-", $req['dt_nascimento']);
            $date = date("Y/m/d", strtotime($date));
            $this->nome_usuario = $req["nome_usuario"];
            $this->email = $req["email"];
            $this->password = bcrypt($req["senha"]);
            $this->dt_nascimento = $date;
            //$participante = new Participante();
            $this->relacao->peso = $req['peso'];
            $this->relacao->altura = $req['altura'];
            $this->relacao->situacao = $req['objetivo'];;
            $this->relacao->nivel_atividade = $req['nivel_atividade'];
            $this->relacao->update();
            $this->update();
            $this->relacao->nutricionistas()->sync($req['nutricionistas']);
            //$participante->user()->save($this);
        //dd($participante->user);
        // $this->save();
        // $this->relacao()->associate($participante);
    }

    public function excluir () {
        $this->relacao->delete();
        $this->delete();
    }

    public function relacao()
    {
        return $this->morphTo();
    }
    public function dietas()
    {
        return $this->belongsToMany(Dieta::class, "user_dieta");
    }

    public function participarDieta($data)
    {
        $dieta = Dieta::find($data['dieta_id']);
        //$quantidade_participacao = $this->dietas()->wherePivot('dieta_id', $data['dieta_id'])->count() + 1;
        $quantidade_participacao = $this->dietas()->wherePivot('dieta_id', $data['dieta_id'])->orderBy('quantidade_participacao', 'desc')->withPivot('quantidade_participacao')->first();
        $quantidade_participacao = ($quantidade_participacao) ? $quantidade_participacao->pivot->quantidade_participacao + 1 : 1;
        $dateinicio = str_replace("/", "-", $data['dt_inicio']);
        $dateinicio = date("Y/m/d", strtotime($dateinicio));
        $datefinal = str_replace("/", "-", $data['dt_final']);
        $datefinal = date("Y/m/d", strtotime($datefinal)); 
        $this->dietas()->save($dieta, ["quantidade_participacao" => $quantidade_participacao, "ativo" => 1, "dt_inicio" => $dateinicio, "dt_termino" => $datefinal]);
        $this->adicionarPeso(['peso' => Auth::user()->relacao->peso]);
    }
    public function removerParticipacao($data)
    {
        $this->dietas()->wherePivot('dieta_id', '=' ,$data['dieta'])->wherePivot('quantidade_participacao', '=' ,$data['participacao'])->detach();
    }
    public function adicionarPeso($data) 
    {
        $todos = Dieta::exibirBibliotecaDietas(Auth::user());
        $dieta_active = $todos[0];
        $peso = new Peso();
        $peso->peso = $data['peso'];
        $peso->dt_pesagem = date('Y-m-d');
        $peso->dieta_id = $dieta_active->pivot->dieta_id;
        $peso->user_id = $dieta_active->pivot->user_id;
        $peso->quantidade_participacao = $dieta_active->pivot->quantidade_participacao;
        $peso->save();
        Auth::user()->relacao->peso = $data['peso']; 
        Auth::user()->relacao->update(); 
    }
    public function pesos()
    {
        return $this->hasMany('App\Peso');
    } 
}
