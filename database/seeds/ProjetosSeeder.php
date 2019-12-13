<?php

use Illuminate\Database\Seeder;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert(['nome'=>'Sistema Bancário', 'tempo'=>200]);
        DB::table('projetos')->insert(['nome'=>'Sistema de Lojas de Veículos', 'tempo'=>150]);
        DB::table('projetos')->insert(['nome'=>'Sistema de Home Office', 'tempo'=>100]);
        DB::table('projetos')->insert(['nome'=>'Sistema Pessoal de Jogos', 'tempo' => 60]);
    }
}
