<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index(){
        $configurations = Configuration::all();
        return view('configuration.index', compact('configurations'));
    }
}
