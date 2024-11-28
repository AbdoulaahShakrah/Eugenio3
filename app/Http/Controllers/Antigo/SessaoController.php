<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SessaoController extends Controller
{
    public function criarSessao(Request $request)
    {
        // Criar uma nova sessão
        $sessao = new Sessao();
        $sessao->Name = $request->query('sessionName');
        $sessao->Data_sessao = now();
        $sessao->save();
        session(['sessionId' => Sessao::latest('PK_Sessao')->first()->PK_Sessao, 'sessionName' => $sessao->Name]);
        return view('home', ['sessionId' => $sessao->PK_Sessao, 'sessionName' => $sessao->Name]);

    }

    public function clearSession()
    {
        Session::flush();
        return view('Home');
    }

    public function setSession(Request $request)
    {
        $sessionId = $request->query('sessionId');
        session(['sessionId' => $sessionId ]);
        $session = Sessao::find($sessionId);
        session(['sessionName' => $session->Name ]);
        return view('home');
    }

    public function getAllSessions()
    {
        return view('escolher_sessao')->with('sessions', Sessao::all());
        //return response()->json(Sessao::all());
    }
}
