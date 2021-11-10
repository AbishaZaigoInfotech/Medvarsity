<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\CrmSetting;
use GuzzleHttp\Client;

class TokenGeneratorController extends Controller
{
    // Generating access token from refresh token
    public function refreshToken()
    {
        $setting = CrmSetting::where('id', 1)->first();
        $client = new Client();
        $URI = 'https://accounts.zoho.com/oauth/v2/token';
        $params['form_params'] = array(
            'client_id' => $setting->client_id,
            'client_secret' => $setting->client_secret,
            'refresh_token' => $setting->refresh_token,
            'grant_type' => 'refresh_token'
        );
        $response = $client->post($URI, $params);   
        $data = json_decode($response->getBody(), true);
        // Inserting the newly generated access token in CRM settings table
        $crm_setting = CrmSetting::find(1);
        $crm_setting->access_token = $data['access_token'];
        $crm_setting ->update();
    }
}
