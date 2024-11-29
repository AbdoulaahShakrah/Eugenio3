<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Session;
use App\Models\SessionConfiguration;
use Illuminate\Http\Request;

class SessionConfigurationController extends Controller
{
    public function index($session_id){
        $configs = Configuration::all();
        return view('sessionconfiguration.index', ['session' => Session::find($session_id), 'configs' => $configs]);
    }

    public function update(Request $request, $session_id){

        $all_configs = $request->input('allConfigs', []);
        $selectedConfigs = $request->input('selectedConfigs', []);
        $out_configs = array_diff($all_configs, $selectedConfigs);

        foreach($selectedConfigs as $in_config){
            if(SessionConfiguration::where('session_id', $session_id)
                                    ->where('configuration_id', $in_config)
                                    ->get()
                                    ->isEmpty()){
                                                    SessionConfiguration::insert(
                                                                [
                                                                            'configuration_id' => $in_config, 
                                                                            'session_id' => $session_id
                                                                        ]);
            }
        }

        foreach($out_configs as $out_config){
            $sc = SessionConfiguration::where('session_id', $session_id)
                                        ->where('configuration_id', $out_config)
                                        ->first();
            
            if ($sc) $sc->delete(); 
        }
        
        return redirect()->back()->with('success', 'Lista de Configurações de Sessão alterada com sucesso');
    }
}
