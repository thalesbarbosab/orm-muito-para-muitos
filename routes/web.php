<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \App\Projeto;
use \App\Desenvolvedor;
use \App\Alocacao;

Route::get('/desenvolvedor_projeto', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    //return $desenvolvedores->toJson();


    foreach($desenvolvedores as $d){
        $h = " horas";
        echo "<hr>";
        echo "<p>Nome do Desenvolvedor: $d->nome </p>";
        echo "<p>Cargo: $d->cargo </p>";
        if(count($d->projetos) > 0){
            $i = 0;
            foreach($d->projetos as $p){
                $i = $i + 1;
                echo "<ul> <span>Projeto $i</span> ";
                    print "<li>Nome Projeto: " . $p->nome . "</li>";
                    print "<li>Horas Estimadas: " . $p->tempo . $h . "</li>";
                    print "<li>Horas Trabalhadas: " . $p->pivot->horas_semanais . $h . "</li>";
                echo "</ul>";
            }
        }
    }
});

Route::get('/projeto_desenvolvedores', function(){
    $projetos = Projeto::with('desenvolvedores')->get();
    //return $projetos->toJson() ;

    foreach($projetos as $p){
        echo "<hr>";
        echo "<p>Nome / ID Projeto: " . $p->id . " / " . $p->nome . "</p>";
        echo "<p>Tempo de Projeto: $p->tempo</p>";
        if(count($p->desenvolvedores)>0){
            foreach($p->desenvolvedores as $d){
                echo "<ul>";
                    echo "<li> Desenvolvedor ID: " . $d->id . "</li>";
                    echo "<li> Desenvolvedor nome: " . $d->nome . "</li>";
                    echo "<li> Cargo: " . $d->cargo . "</li>";
                    echo "<li> Horas Trabalhadas: " . $d->pivot->horas_semanais . "</li>";
                echo "</ul>";
            }
        }else{
            echo "<ul>";
                echo "<li>Não há desenvolvedores alocados neste projeto</li>";
            echo "</ul>";
        }

    }
});

Route::get('/alocar', function(){
    $projetos = Projeto::find(4);
    if(isset($projetos)){
        $projetos->desenvolvedores()->attach(3,['horas_semanais'=>20]);
    }
});
Route::get('/desalocar', function(){
    $projetos = Projeto::find(4);
    if(isset($projetos)){
        $projetos->desenvolvedores()->detach([1,3]);
    }
});
