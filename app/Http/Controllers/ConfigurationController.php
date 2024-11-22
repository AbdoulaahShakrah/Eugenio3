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

    
    public function destroy($id){
        
        $configuration = Configuration::where('configuration_id', $id)->firstOrFail();

        $configuration->delete();

        return redirect()->route('config.index')->with('delete_success', 'Configuração excluída com sucesso!');
    }
}
