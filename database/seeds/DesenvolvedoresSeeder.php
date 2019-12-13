<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome'=>'Thales', 'cargo'=>'Analista Desenvolvedor']);
        DB::table('desenvolvedores')->insert(['nome'=>'Jose', 'cargo'=>'Analista Sistemas']);
        DB::table('desenvolvedores')->insert(['nome'=>'Ana Rosa', 'cargo'=>'Analista Financeiro']);
    }
}
