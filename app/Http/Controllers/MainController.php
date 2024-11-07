<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Player;

class MainController extends Controller
{
    public function index(){

        // EXPERIÊNCIAS

        $players_in_session1 = Session::find(1)->players();
        $playersandsession = Session::with('players')->get();
        
        echo $playersandsession;

        $player = Player::with('tests.configuration')->find(1);

        //echo $player->toJson();

        

    }
}
