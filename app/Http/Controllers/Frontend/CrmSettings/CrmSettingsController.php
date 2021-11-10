<?php

namespace App\Http\Controllers\Frontend\CrmSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\CrmSetting;
use App\Http\Requests\CrmRequest;

class CrmSettingsController extends Controller
{
    // CRM configuration details
    public function index()
    {
        $crm_setting = CrmSetting::get();
        // Check if the details already exist
        if(!$crm_setting->isEmpty()){
            $setting = $crm_setting[0];
            return view('frontend.crm.index',  compact('setting'));
        }else{
            $setting = null;
            return view('frontend.crm.index',  compact('setting'));
        }
    }
    public function edit()
    {
        $crm_setting = CrmSetting::get();
        // Check if the details already exist
        if(!$crm_setting->isEmpty()){
            $setting = $crm_setting[0];
            return view('frontend.crm.edit', compact('setting'));
        }else{
            $setting = null;
            return view('frontend.crm.edit', compact('setting'));
        }
    }
    public function update(CrmRequest $request){
        $crm_setting = CrmSetting::get();
        // Check if the details already exist 
        if(!$crm_setting->isEmpty()){
            // For updating the CRM configurations
            $crm_setting = CrmSetting::find(1);
            $crm_setting->ip_address = $request->ip_address;
            $crm_setting->port = $request->port;
            $crm_setting->homepage_url = $request->homepage_url;
            $crm_setting->callback_url = $request->callback_url;
            $crm_setting->client_id = $request->client_id;
            $crm_setting->client_secret = $request->client_secret;
            $crm_setting->grant_token = $request->grant_token;
            $crm_setting->access_token = $request->access_token;
            $crm_setting->refresh_token = $request->refresh_token;
            $crm_setting->session_timeout = $request->session_timeout;
            $crm_setting->frequency = $request->frequency;
            $crm_setting->save();
            return redirect()->route('crm.index')->withSuccess('CRM Settings updated successfully.');
        }else{
            // For creating the CRM configurations
            $crm_setting = new CrmSetting;
            $crm_setting->ip_address = $request->ip_address;
            $crm_setting->port = $request->port;
            $crm_setting->homepage_url = $request->homepage_url;
            $crm_setting->callback_url = $request->callback_url;
            $crm_setting->client_id = $request->client_id;
            $crm_setting->client_secret = $request->client_secret;
            $crm_setting->grant_token = $request->grant_token;
            $crm_setting->access_token = $request->access_token;
            $crm_setting->refresh_token = $request->refresh_token;
            $crm_setting->session_timeout = $request->session_timeout;
            $crm_setting->frequency = $request->frequency;
            $crm_setting->save();
            return redirect()->route('crm.index')->withSuccess('CRM Settings created successfully.');
        }
    }
}
