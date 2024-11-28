<?php

namespace App\Http\Controllers;

use App\Models\Classificacao;
use App\Models\Configuracao;
use App\Models\Jogador;
use App\Models\Sessao;
use App\Models\Teste;
use Illuminate\Http\Request;

class ClassificacaoAtualController extends Controller
{
    function index(Request $request)
    {

        // Obter a sessão atual
        $sessionId = session("sessionId");
        $sessao = Sessao::where('PK_Sessao', $sessionId)->first();

        //Obter os dados passados por url
        $wpm = $request->input('wpm');
        $correctWords = $request->input('correctWords');
        $incorrectWords = $request->input('incorrectWords');
        $timePassed = $request->input('timePassed');
        $pontuacaoFinal = $request->input('pontuacaoFinal');
        $PK_Configuracao = session("configId");
        $PK_Jogador = $request->input('jogador');
        $expectedTextWithStyles = $request->input('expectedTextWithStyles');

        // Criar uma nova classificação, na BD, baseada nesses dados
        $classificacao = new Classificacao();
        $classificacao->WPM = $wpm;
        $classificacao->QTD_Erros = $incorrectWords;
        $classificacao->QTD_Certas = $correctWords;
        $classificacao->Tempo = $timePassed;
        $classificacao->Pontuacao_Final = $pontuacaoFinal;
        $classificacao->save();

        // Obter o teste que do utilizador para esta configuração
        $thisTest = Teste::where('FK_Sessao', session("sessionId"))
            ->where('FK_Configuracao', $PK_Configuracao)
            ->where('FK_Jogador', $PK_Jogador)
            ->first();
        if ($thisTest === null) {
            $thisTest = new Teste();
            $thisTest->FK_Jogador = $PK_Jogador;
            $thisTest->FK_Configuracao = session("configId");
            $thisTest->FK_Sessao = session("sessionId");
            $thisTest->save();
        }

        $thisTest->update(['FK_Classificacao' => $classificacao->PK_Classificacao]);

        return view('classificacao-config', [
            'classificacao' => $classificacao,
            'NomeJogador' => Jogador::find($PK_Jogador)->Nome,
            'Configuracao' => Configuracao::find($PK_Configuracao),
            'expectedTextWithStyles' => $expectedTextWithStyles,
        ]);

    }
}
