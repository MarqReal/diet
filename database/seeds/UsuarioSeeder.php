<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Funcionario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $funcionario = new Funcionario();

        if (!User::where("email", $faker->email)->count()) {
            $funcionario->registro_funcionario = rand(5, 15);
            $funcionario->save();
            $usuario = new User();
            $usuario->nome_usuario  = $faker->name;
            $usuario->email         = $faker->email;
            $usuario->password      = bcrypt("admin123");
            $usuario->dt_nascimento = '1111-11-11';
            $funcionario->user()->save($usuario);
            echo "e-mail: ".$usuario->email." password: admin123";            
        }
    }
}
