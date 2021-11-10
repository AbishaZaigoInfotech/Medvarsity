<?php

namespace App\Http\Controllers\Frontend\ConvoxSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\ConvoxSetting;
use App\Http\Requests\ConvoxRequest;

class ConvoxSettingsController extends Controller
{
    // Convox configuration details
    public function index()
    {
        $convox_setting = ConvoxSetting::get();
        if(!$convox_setting->isEmpty()){
            $setting = $convox_setting[0];
            return view('frontend.convox.index',  compact('setting'));
        }else{
            $setting = null;
            return view('frontend.convox.index',  compact('setting'));
        }
    }
    public function edit()
    {
        $convox_setting = ConvoxSetting::get();
        // Check if the details already exist
        if(!$convox_setting->isEmpty()){
            $setting = $convox_setting[0];
            return view('frontend.convox.edit', compact('setting'));
        }else{
            $setting = null;
            return view('frontend.convox.edit', compact('setting'));
        }
    }
    public function update(ConvoxRequest $request){
        $convox_setting = ConvoxSetting::get();
        // Check if the details already exist 
        if(!$convox_setting->isEmpty()){
            // For updating the Convox configurations
            $convox_setting = ConvoxSetting::find(1);
            $convox_setting->ip_address = $request->ip_address;
            $convox_setting->port = $request->port;
            $convox_setting->homepage_url = $request->homepage_url;
            $convox_setting->callback_url = $request->callback_url;
            $convox_setting->client_id = $request->client_id;
            $convox_setting->client_secret = $request->client_secret;
            $convox_setting->access_token = $request->access_token;
            $convox_setting->session_timeout = $request->session_timeout;
            $convox_setting->frequency = $request->frequency;
            $convox_setting->save();
            return redirect()->route('convox.index')->withSuccess('Convox Settings updated successfully.');
        }else{
            // For creating the Convox configurations
            $convox_setting = new ConvoxSetting;
            $convox_setting->ip_address = $request->ip_address;
            $convox_setting->port = $request->port;
            $convox_setting->homepage_url = $request->homepage_url;
            $convox_setting->callback_url = $request->callback_url;
            $convox_setting->client_id = $request->client_id;
            $convox_setting->client_secret = $request->client_secret;
            $convox_setting->access_token = $request->access_token;
            $convox_setting->session_timeout = $request->session_timeout;
            $convox_setting->frequency = $request->frequency;
            $convox_setting->save();
            return redirect()->route('convox.index')->withSuccess('Convox Settings created successfully.');
        }
    }
}
