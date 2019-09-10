<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Participante;
use App\Dieta;
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

    public function participarDieta($data)
    {
        $dieta = Dieta::find($data['dieta_id']);
        $this->dietas()->save($dieta, ["refeicao" => "cafeManha", "quantidade" => $dados['qtdCafeManha'][$alimento->nome]]);
    } 
}
