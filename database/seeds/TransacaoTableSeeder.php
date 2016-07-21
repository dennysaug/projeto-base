<?php

use App\GrupoUsuario;
use App\Transacao;
use Illuminate\Database\Seeder;

class TransacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE transacaos');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        # GRUPO DE USUÁRIO
        Transacao::create([
            'categoria_id' => 1,
            'permissao' => 'grupo-usuario.visualizar',
            'label' => 'Visualizar'
        ]);
        Transacao::create([
            'categoria_id' => 1,
            'permissao' => 'grupo-usuario.cadastrar',
            'label' => 'Cadastrar'
        ]);
        Transacao::create([
            'categoria_id' => 1,
            'permissao' => 'grupo-usuario.alterar',
            'label' => 'Alterar'
        ]);
        Transacao::create([
            'categoria_id' => 1,
            'permissao' => 'grupo-usuario.excluir',
            'label' => 'Excluir'
        ]);

        # USUÁRIO
        Transacao::create([
            'categoria_id' => 2,
            'permissao' => 'usuario.visualizar',
            'label' => 'Visualizar'
        ]);
        Transacao::create([
            'categoria_id' => 2,
            'permissao' => 'usuario.cadastrar',
            'label' => 'Cadastrar'
        ]);
        Transacao::create([
            'categoria_id' => 2,
            'permissao' => 'usuario.alterar',
            'label' => 'Alterar'
        ]);
        Transacao::create([
            'categoria_id' => 2,
            'permissao' => 'usuario.excluir',
            'label' => 'Excluir'
        ]);

        # PERMISSÃO
        Transacao::create([
            'categoria_id' => 3,
            'permissao' => 'permissao.visualizar',
            'label' => 'Visualizar'
        ]);
        Transacao::create([
            'categoria_id' => 3,
            'permissao' => 'permissao.alterar',
            'label' => 'Alterar'
        ]);

        # Log
        Transacao::create([
            'categoria_id' => 4,
            'permissao' => 'log.visualizar',
            'label' => 'Visualizar'
        ]);

        $transacoes = Transacao::select('id')->get()->lists('id')->toArray();
        GrupoUsuario::find(1)->permissao()->sync($transacoes);
    }
}
