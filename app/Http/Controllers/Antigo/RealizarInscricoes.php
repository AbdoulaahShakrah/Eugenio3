<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Jogador;
use App\Models\Teste;
use App\Models\Sessao;
use App\Models\Configuracao;
class RealizarInscricoes extends Controller
{
    function index() {
        //Obter a sessão mais recente
        $sessionId = session("sessionId");
        $sessao = Sessao::where('PK_Sessao',$sessionId)->first();

        // Obter os jogadores inscritos na sessão
        $jogadores = Jogador::whereHas('testes', function($query) use ($sessao) {
            $query->whereHas('sessao', function($query) use ($sessao) {
                $query->where('PK_Sessao', $sessao->PK_Sessao);
            });
        })->get();
        return view('realizar_inscricoes', ['jogadores' => $jogadores]);
    }

    public function adicionarJogador(Request $request) {

        // Criar o jogador
            $jogador = new Jogador();
            $jogador->Nome = $request->input('nomeJogador');
            $jogador->Idade = 0;
            $jogador->save();


            $teste = new Teste();
            $teste->FK_Jogador = $jogador->PK_Jogador;
            $teste->FK_Configuracao = session("configId");
            $teste->FK_Sessao = session("sessionId");
            $teste->save();
       
        return redirect()->route('realizar-inscricoes');
    }
}
