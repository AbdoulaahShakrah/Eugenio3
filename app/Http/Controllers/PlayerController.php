<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function sessionPlayers($id)
    {
        $players = Player::where('session_id', $id)->get();
        return view('player.index', compact('players'));
    }

    public function store($id, Request $request)
    {
        $player_name = $request->input('player_name');
        Player::create(['player_name' => $player_name, 'session_id' => $id]);
        return redirect()->route('player.sessionPlayers', ['id' => $id])
            ->with('success', 'Jogador adicionado com sucesso!');
    }

    public function destroy($id1, $id2){
        $player = Player::where('session_id', $id1)->where('player_id', $id2)->firstOrFail();
        $player->delete();
        return redirect()->back()->with('success', 'Jogador excluído com sucesso!');
    }

    public function edit(Request $request){

        Player::find($request->input('id'))->update(['player_name' => $request->input('name')]);
        return redirect()->route('player.sessionPlayers', ['id' => $request->input(key: 'session_id')])->with('editSucess', 'Nome do jogador editado com sucesso');
    }
}
