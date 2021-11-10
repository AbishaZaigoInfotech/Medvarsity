<?php

namespace App\Http\Controllers\Backend\Convox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Lead;

class ConvoxController extends Controller
{
    public function makeCalls()
    {
        $lead = Lead::all();
        $token = 'A';
        $count = count($lead);
        $client = new Client();
        $URI = 'http://<CONVOX SERVER IP>/ConVoxCCS/External/ external_dialer';
        $headers = [
            'Authorization' => 'Bearer ' . $token,   
            'Content-Type' => 'application/json',
        ];
        $params['form_params'] = [];
        for($i=0; $i<$count; $i++){
            $input[] = array(
                'MOBILE_NO' => 'Mobile number',
                'USER_ID' => 'Mobile number',
                'CALL_MODE' => 'Mobile number',
                'CALL_STATUS' => 'Mobile number',
                'CALL_DATE' => 'Mobile number',
                'CALL_HOUR' => 'Mobile number',
                'CALL_MINUTE' => 'Mobile number',
                'CALL_DURATION' => 'Mobile number',
                'QUEUE_NAME' => 'Mobile number',
                'QUEUE_DURATION' => 'Mobile number',
                'RING_DURATION' => 'Mobile number',
                'COMPLETED_BY' => 'Mobile number',
                'FOLLOWUP_TIME' => 'Mobile number',
                'STATION' => 'Mobile number',
                'LIST_ID' => 'Mobile number',
                'DID' => 'Mobile number',
                'LEAD_ID' => 'Mobile number',
                'CALL_REFERENCE_ID' => 'Mobile number',
                'DISPOSITION' => 'Mobile number',
                'PROCESS_NAME' => 'Mobile number',
                'RECORDING_FILE_NAME' => 'Mobile number',
            );
        }
        
        $response = $client->post($URI, $params);   
        $data = json_decode($response->getBody(), true);
        dd($data);
    }
}
