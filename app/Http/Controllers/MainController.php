<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Player;

class MainController extends Controller
{
    public function index(){
        return view('home_page');
    }

    public function handleButtons(Request $request){
        $action = $request->input('action');

        switch ($action){
            case 'sessions':
                return redirect()->route('sessions.index');
            case 'configs':
                return redirect()->route('config.index');
            case 'start':
                #return redirect()->route('challenge.start');
            case 'results':
                #return redirect()->route('results.index');
            default:
                #return back()->with('error', 'Ação inválida!');
        }
    }
}
