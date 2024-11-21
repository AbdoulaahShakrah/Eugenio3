<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Player;

class PlayerController extends Controller
{
    public function sessionPlayers($id){
        $players = Player::where('session_id', $id)->get();
        return view('player.index', compact('players'));
    }


    public function store($id, Request $request){
        $player_name = $request->input('player_name');
        Player::create(['player_name' => $player_name, 'session_id' => $id]);
        return redirect()->route('player.sessionPlayers', ['id' => $id])
        ->with('success', 'Jogador criado com sucesso!');    }
}
