<?php

namespace App\Http\Controllers;

use App\Models\Jogador;

use App\Models\Configuracao;


class DesafioController extends Controller
{
    function index(){
        
        // Obter a configuração selecionada
        $configuracaoID = session("configId");
        $configuracao = Configuracao::find($configuracaoID);
        if($configuracao === null){
            $configuracao = Configuracao::first();
            session(['configId' => $configuracao->PK_Configuracao]);
        }
        // Obter o jogador selecionado
        $jogadorID = request()->get('jogadores');
        $jogador = Jogador::find($jogadorID);

        $tempo_config = ($configuracao->Tempo_Configuracao);

        return view('desafio', [
            'configuracao' => $configuracao,
            'jogador' => $jogador,
            'tempo_config' => $tempo_config
        ]);
    }

    function configClassification(){

    }
}
