<?php

use App\CategoriaTransacao;
use Illuminate\Database\Seeder;

class CategoriaTransacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE categoria_transacaos');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        CategoriaTransacao::create(['nome' => 'Grupo de Usuário']);
        CategoriaTransacao::create(['nome' => 'Usuário']);
        CategoriaTransacao::create(['nome' => 'Permissão']);
        CategoriaTransacao::create(['nome' => 'Log']);
    }
}
