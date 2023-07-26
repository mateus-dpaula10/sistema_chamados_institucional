<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            // 'nome' => 'Andressa Cristina',
            // 'password' => bcrypt('password'),
            // 'login' => 'andressa@ceert.org.br',
            // 'email' => 'andressa@ceert.org.br',
            // 'ativo' => '1',
            // 'permissao' => 'Sim',
            // 'dpto' => 'Design',
            // 'tipo_acesso' => 'Colaborador',
            // 'empresa' => 'CEERT',
            // 'data_hora' => '',
            // 'msg' => null,
            // 'aceita_email' => 'Sim',
            // 'nivel_de_acesso' => '1'
            // 'nome' => 'Mateus Teste',
            // 'password' => bcrypt('password'),
            // 'login' => 'mateusteste@ceert.org.br',
            // 'email' => 'mateusteste@ceert.org.br',
            // 'ativo' => '1',
            // 'permissao' => 'Sim',
            // 'dpto' => 'Design',
            // 'tipo_acesso' => 'Cliente',
            // 'empresa' => 'CEERT',
            // 'data_hora' => '',
            // 'msg' => null,
            // 'aceita_email' => 'Sim',
            // 'nivel_de_acesso' => '1'
            'nome' => 'teste',
            'tipo_acesso' => '1',
            'email' => 'mateus@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
