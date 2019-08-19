<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Participante;
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
    public function relacao()
    {
        return $this->morphTo();
    }
}
