<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassificationController extends Controller
{
    function index($session_id)
    {

        $session = Session::find($session_id);
        // Obter a lista de classificações usando join para incluir o player_name
        $rankings = Test::select(
            'players.player_name', // Substituir player_id por player_name
            DB::raw('AVG(tests.wpm) as avg_wpm'),
            DB::raw('AVG(tests.test_error) as avg_test_error'),
            DB::raw('AVG(tests.test_correct) as avg_test_correct'),
            DB::raw('AVG(tests.test_time) as avg_test_time'),
            DB::raw('SUM(tests.final_score) as avg_final_score')
        )
            ->join('players', 'tests.player_id', '=', 'players.player_id') // Fazer o join com a tabela players
            ->where('tests.session_id', $session_id) // Filtrar pela sessão mais recente
            ->groupBy('players.player_name') // Agrupar por nome do jogador
            ->orderByDesc('avg_final_score') // Ordenar pela maior média de final_score
            ->get();
            
        return view('classification.ranking', compact('rankings', 'session'));
    }
}

