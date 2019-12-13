<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projeto extends Model
{
    protected $table = 'projetos';
    function desenvolvedores(){
        return $this->belongsToMany('\App\Desenvolvedor','alocacoes')->withPivot('horas_semanais');
    }
}
