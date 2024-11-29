<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Player;

class MainController extends Controller
{
    public function index(){
        return view('home_page', ['sessions' => Session::orderBy('created_at', 'desc')->limit(5)->get()]);
    }

    public function checkAdminPassword(Request $request){
        if ($request->input('admin_password') != 'admin') return redirect()->back()->with('error', 'Senha de administrador incorreta.');

        return redirect()->route('admin');
    }

    public function admin(){
        return view('admin_options');
    }

    public function handleButtons(Request $request){
        $action = $request->input('action');

        switch ($action){
            case 'sessions':
                return redirect()->route('sessions.index');
            case 'configs':
                return redirect()->route('config.index');
            case 'start':
                return redirect()->route('challenge.start.session');
            case 'results':
                return redirect()->route('final-results');
            default:
                #return back()->with('error', 'Ação inválida!');
        }
    }
}
