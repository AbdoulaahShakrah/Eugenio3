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

    public function create(Request $request){
        $config_name = $request->input('config_name');
        return view('configuration.create', compact('config_name'));
        //return view('configuration.update', compact('configuration'));
    }

    public function store(Request $request)
    {
        $configuration_title = $request->input('configuration_title');
        $configuration_time = $request->input('configuration_time');
        $configuration_text = $request->input('configuration_text');
        Configuration::create([
            'configuration_title' => $configuration_title,
            'configuration_time' => $configuration_time,
            'configuration_text' => $configuration_text
        ]);
        return redirect()->route('config.index')->with('success', 'Configuração adicionada com sucesso!');
    }

    public function change(Request $request, $id){
        $configuration = Configuration::findOrFail($id);
        return view('configuration.update', compact('configuration'));
    }

    public function update(Request $request, $id)
    {
        $configuration_title = $request->input('configuration_title');
        $configuration_time = $request->input('configuration_time');
        $configuration_text = $request->input('configuration_text');
        
        $configuration = Configuration::findOrFail($id);
        $configuration->update([
            'configuration_title' => $configuration_title,
            'configuration_time' => $configuration_time,
            'configuration_text' => $configuration_text
        ]);
        return redirect()->route('config.index')->with('success', 'Configuração atualizada com sucesso!');
    }

    public function destroy($id){ 
        $configuration = Configuration::where('configuration_id', $id)->firstOrFail();
        $configuration->delete();
        return redirect()->route('config.index')->with('success', 'Configuração excluída com sucesso!');
    }
}
