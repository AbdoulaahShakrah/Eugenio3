<?php

namespace App\Http\Controllers;

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
        return redirect()->back()->with('success', 'Sessão criada com sucesso!');
    }
}
