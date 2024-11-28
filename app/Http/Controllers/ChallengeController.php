<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Player;
use App\Models\Session;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ChallengeController extends Controller
{
    public function chooseSession(){
        return view('challenge.choose_session', ['sessions' => Session::orderBy('created_at', 'desc')->limit(5)->get()]);
    }

    public function choosePlayer($session_id){
        return view('challenge.choose_player', ['players' => Player::where('session_id', $session_id)->get()]);
    }

    public function chooseConfig($session_id, $player_id){
        return view('challenge.choose_config', ['configs' => Configuration::all(), 'session_id' => $session_id, 'player_id' => $player_id]);
    }

    public function confirmSettings($session_id, $player_id, $config_id){
        return view('challenge.confirm_settings', ['session' => Session::find($session_id), 'player' => Player::find($player_id), 'config' => Configuration::find($config_id)]);
    }

    function playGame($session_id, $player_id, $config_id){
        if( Test::where('player_id', $player_id)->where('configuration_id', $config_id)->first() != null ){
            return redirect()->back()->with('error', 'Não é possível realizar o mesmo teste mais do que uma vez!');
        }
        $configuracao = Configuration::find($config_id);
        $session = Session::find($session_id);
        $jogador = Player::find($player_id);
        $tempo_config = ($configuracao->configuration_time);

        return view('challenge.challenge', [
            'configuracao' => $configuracao,
            'session' => $session,
            'jogador' => $jogador,
            'tempo_config' => $tempo_config
        ]);
    }

    function showResult(Request $request)
    {
        //Obter os dados passados por url
        $wpm = $request->input('wpm');
        $correctWords = $request->input('correctWords');
        $incorrectWords = $request->input('incorrectWords');
        $timePassed = $request->input('timePassed');
        $pontuacaoFinal = $request->input('pontuacaoFinal');
        $PK_Configuracao = $request->input('configuracao');
        $PK_Jogador = $request->input('jogador');
        $PK_Session = $request->input('session');
        $expectedTextWithStyles = $request->input('expectedTextWithStyles');

        $classificacao = new Test(
            [
                'session_id' => $PK_Session,
                'player_id' => $PK_Jogador,
                'configuration_id' => $PK_Configuracao,
                'wpm' => $wpm,
                'test_error' => $incorrectWords,
                'test_correct' => $correctWords,
                'test_time' => $timePassed,
                'final_score' => $pontuacaoFinal,
                'created_at' => Date('Y-m-d')
            ]
        );
        $classificacao->save();

        return view('challenge.result', [
            'classificacao' => $classificacao,
            'session' => Session::find($PK_Session),
            'NomeJogador' => Player::find($PK_Jogador)->player_name,
            'Configuracao' => Configuration::find($PK_Configuracao),
            'expectedTextWithStyles' => $expectedTextWithStyles,
        ]);
    }
}
