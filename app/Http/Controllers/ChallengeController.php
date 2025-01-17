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
    public function index($session_id, Request $request){
        $configs = Configuration::with('sessionConfigurations')
            ->whereHas('sessionConfigurations', function ($query) use ($session_id) {
                $query->where('session_id', $session_id);
            })
            ->get();
    
        $players = Player::where('session_id', $session_id)->get();
        $session = Session::find($session_id);
            
        // Caso contrário, não passamos a configuração
        return view('challenge.select_settings', ['configs' => $configs, 'players' =>  $players, 'session' => $session]);
    }
    

    public function checkSessionPassword(Request $request){
        $session = Session::find($request->input('session_id'));

        if( $session->session_password != $request->input('session_password')){
            return redirect()->back()->with('erro', 'password incorreta.');
        }

        //TODO colocar na session que estou logado em sessão especifica (forma mais simples de autenticar).
        //session('session', session_id)
        
        return redirect()->route('challenge.start', ['session_id' => $session->session_id]);
    }

    public function validateSettings(Request $request){

        //TODO validar request
        // o melhor seria criptograr os ids dentro da view e decriptografar aqui.
        $player_id = $request->input('player_id');
        $configuration_id = $request->input('config_id');
        $session_id = $request->input('session_id');

        return redirect()->route('challenge', ['player_id' => $player_id, 'config_id' => $configuration_id, 'session_id' => $session_id]);
    }



    function playGame($session_id, $player_id, $config_id){
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
        $config_id = $request->input('configuracao');
        $player_id = $request->input('jogador');
        $PK_Session = $request->input('session');
        $expectedTextWithStyles = $request->input('expectedTextWithStyles');

      
            $classificacao = new Test(
                [
                    'session_id' => $PK_Session,
                    'player_id' => $player_id,
                    'configuration_id' => $config_id,
                    'wpm' => $wpm,
                    'test_error' => $incorrectWords,
                    'test_correct' => $correctWords,
                    'test_time' => $timePassed,
                    'final_score' => $pontuacaoFinal,
                    'created_at' => Date('Y-m-d')
                ]
            );
            $classificacao->save();

        
        

        session()->flash('config_id', $config_id);

        return view('challenge.result', [
            'classificacao' => $classificacao,
            'session' => Session::find($PK_Session),
            'player' => Player::find($player_id),
            'Configuracao' => Configuration::find($config_id),
            'expectedTextWithStyles' => $expectedTextWithStyles,
        ]);
    }
}