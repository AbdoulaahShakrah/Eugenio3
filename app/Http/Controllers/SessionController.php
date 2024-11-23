<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        $sessions = Session::all();
        return view('session.index', compact('sessions'));
    }

    public function store(Request $request){
        $session_name = $request->input('session_name');
        Session::create(['session_name' => $session_name]);
        return redirect()->back()->with('success', 'Sessão adicionada com sucesso!');
    }

    public function update(Request $request, $id){
        $session_name = $request->input('session_name');
        $session = Session::findOrFail($id);
        $session->update(['session_name' => $session_name]);
        return redirect()->back()->with('success', 'Sessão adicionada com sucesso!');
    }

    public function destroy($id){
        $players = Player::where('session_id', $id)->get();
        foreach ($players as $player) {
            $player->delete();
        }

        $session = Session::where('session_id', $id)->firstOrFail();
        $session->delete();
        return redirect()->back()->with('success', 'Sessão excluída com sucesso!');
    }
}
