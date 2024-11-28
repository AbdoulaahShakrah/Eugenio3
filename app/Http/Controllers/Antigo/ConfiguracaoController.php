<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Configuracao;

class ConfiguracaoController extends Controller
{
    function getAllConfigs(){

        return view('configuracoes')->with('configuracoes', Configuracao::all());
    }

    function addConfig(Request $request){
        // Criar o jogador
        $configuracao = new Configuracao();
        $configuracao->Titulo = $request->input('titulo');
        $configuracao->Tempo_Configuracao = $request->input('tempo_configuracao');
        $configuracao->Texto = $request->input('texto');
        $configuracao->save();
        return view('configuracoes')->with('configuracoes', Configuracao::all());
    }

    function setConfig(Request $request){
        session(['configId' => $request->input('configId')]);
        return view('configuracoes')->with('configuracoes', Configuracao::all());
    }
}
