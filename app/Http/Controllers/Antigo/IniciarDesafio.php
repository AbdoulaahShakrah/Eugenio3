<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Jogador;
use App\Models\Configuracao;
use App\Models\Sessao;

class IniciarDesafio extends Controller
{
    function index(){

        // Obter sessão mais recente
        $sessionId = session("sessionId");
        $sessao = Sessao::where('PK_Sessao',$sessionId)->first();
        // Obter a configuração selecionada
        $configuracaoID = session("configId");
        $configuracao = Configuracao::find($configuracaoID);
        if($configuracao === null){
            $configuracao = Configuracao::first();
            session(['configId' => $configuracao->PK_Configuracao]);
        }
        $configName = $configuracao->Titulo;
       
        // Obter os jogadores inscritos na sessão
        $jogadores = Jogador::whereHas('testes', function($query) use ($sessao) {
            $query->whereHas('sessao', function($query) use ($sessao) {
                $query->where('PK_Sessao', $sessao->PK_Sessao);
            });
        })->get();

        return view('iniciar_desafio', [
            //'configuracoes' => $configuracoes,
            'configName' => $configName,
            'jogadores' => $jogadores
        ]);
    }
}
