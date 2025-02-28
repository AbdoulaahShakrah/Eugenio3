<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SessionController extends Controller
{
    public function index(){
        $sessions = Session::orderBy('created_at', 'desc')->paginate(5);
        return view('session.index', compact('sessions'));
    }

    public function store(Request $request){
        $session_name = $request->input('session_name');
        $session_password = "eugenio";

        Session::create(['session_name' => $session_name, 'session_password' => $session_password]);
        return redirect()->back()->with('success', 'Sessão adicionada com sucesso!');
    }

    public function update(Request $request){
        Session::find($request->input('id'))->update(['session_name' => $request->input('name')]);
        return redirect()->back()->with('success', 'Feito update a sessão com sucesso!');
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
