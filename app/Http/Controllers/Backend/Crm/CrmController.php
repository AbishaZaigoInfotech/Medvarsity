<?php

namespace App\Http\Controllers\Backend\Crm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Settings\CrmSetting;
use App\Models\Lead;
use App\Models\Activity;
use App\Models\CrmUser;
use GuzzleHttp\Client;

class CrmController extends Controller
{

    // Pulling leads from ZOHO CRM
    public function getLeads()
    {
        $setting = CrmSetting::where('id', 1)->select('access_token')->first();
        $token =$setting->access_token;
        $client = new Client();
        $URI = 'https://www.zohoapis.com/crm/v2/Leads';
        $debug = [
            'debug' =>true,
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $token,   
        ];
        $response = $client->get($URI, ['headers' => $headers])->getBody()->getContents(); 
        $data = json_decode($response, true);
        $count =$data['data'];
        $lead_id = Lead::pluck('lead_id');
        $lead_array = (array)$lead_id;
        $id = array_values($lead_array);
        $lead = [];
        // Inserting leads in DB
        for($i=0; $i<count($count); $i++){
            $value = $count[$i];
            if(in_array($value['id'], $id[0])==false){
                $lead[] = [
                    'owner_id' => $value['Owner']['id'],
                    'owner_name' => $value['Owner']['name'],
                    'owner_email' => $value['Owner']['email'],
                    'lead_id' => $value['id'],
                    'company' => $value['Company'],
                    'industry' => $value['Industry'],
                    'state_status' => $value['$state'],
                    'no_of_employees' => $value['No_of_Employees'],
                    'description' => $value['Description'],
                    'rating' => $value['Rating'],
                    'salutation' => $value['Salutation'],
                    'first_name' => $value['First_Name'],
                    'last_name' => $value['Last_Name'],
                    'full_name' => $value['Full_Name'],
                    'approved_status' => $value['$approved'],
                    'approval_delegate' => $value['$approval']['delegate'],
                    'approval_approve' => $value['$approval']['approve'],
                    'approval_reject' => $value['$approval']['reject'],
                    'approval_resubmit' => $value['$approval']['resubmit'],
                    'approval_state' => $value['$approval_state'],
                    'editable_status' => $value['$editable'],
                    'review_process_approve' => $value['$review_process']['approve'],
                    'review_process_reject' => $value['$review_process']['reject'],
                    'review_process_resubmit' => $value['$review_process']['resubmit'],
                    'in_merge' => $value['$in_merge'],
                    'review' => $value['$review'],
                    'email' => $value['Email'],
                    'secondary_email' => $value['Secondary_Email'],
                    'email_opt_out' => $value['Email_Opt_Out'],
                    'skype_id' => $value['Skype_ID'],
                    'phone' => $value['Phone'],
                    'mobile' => $value['Mobile'],
                    'website' => $value['Website'],
                    'twitter' => $value['Twitter'],
                    'tag' => null,
                    'fax' => $value['Fax'],
                    'street' => $value['Street'],
                    'zip_code' => $value['Zip_Code'],
                    'city' => $value['City'],
                    'state' => $value['State'],
                    'country' => $value['Country'],
                    'record_image' => $value['Record_Image'],
                    'currency_symbol' => $value['$currency_symbol'],
                    'annual_revenue' => $value['Annual_Revenue'],
                    'designation' => $value['Designation'],
                    'lead_source' => $value['Lead_Source'],
                    'lead_status' => $value['Lead_Status'],
                    'unsubscribed_mode' => $value['Unsubscribed_Mode'],
                    'converted_status' => $value['$converted'],
                    'converted_detail' => json_encode($value['$converted_detail']),
                    'process_flow_status' => $value['$process_flow'],
                    'orchestration' => $value['$orchestration'],
                    'last_activity_time' => $value['Last_Activity_Time'],
                    'unsubscribed_time' => $value['Unsubscribed_Time'],
                    'created_time' => $value['Created_Time'],
                    'modified_time' => $value['Modified_Time'],
                ];  
            } 
        }
        Lead::insert($lead);
    }

    // Pull activities from ZOHO CRM
    public function getActivities()
    {
        $setting = CrmSetting::where('id', 1)->select('access_token')->first();
        $token =$setting->access_token;
        $client = new Client();
        $URI = 'https://www.zohoapis.com/crm/v2/Activities';
        $debug = [
            'debug' =>true,
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $token,   
        ];
        $response = $client->get($URI, ['headers' => $headers])->getBody()->getContents(); 
        $data = json_decode($response, true);
        $count =$data['data'];
        $lead_id = Lead::pluck('lead_id');
        $lead_array = (array)$lead_id;
        $id = array_values($lead_array);
        $activity = [];
        // Insert the actvities in DB
        for($i=0; $i<count($count); $i++){
            $value = $count[$i];
            if(isset($value['What_Id']['id']) && in_array($value['What_Id']['id'], $id[0])==true){
                $activity[] = [
                    'lead_id' => $value['What_Id']['id'],
                    'activity_id' => $value['id'],
                    'lead_status' => $value['Status'],
                    'modify_id' => $value['Owner']['id'],
                    'modify_by' => $value['Owner']['name'],
                    'modify_email' => $value['Owner']['email'],
                ];
                // Updating the Leads with activity status
                $setting = CrmSetting::where('id', 1)->first();
                $client = new Client();
                $token =$setting->access_token;
                $URL = 'https://www.zohoapis.com/crm/v2/Leads/' . $value['What_Id']['id'];
                $fields = json_encode(array("data" => array(["Owner"=>array("id"=>$value['Owner']['id'])]),'Lead_Status' => "Attempted to Contact"));
                $headers = array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($fields),
                    sprintf('Authorization: Zoho-oauthtoken %s', $token)
                );

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $URL);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);

                $result = curl_exec($ch);
                curl_close($ch); 
            } 
        }
        Activity::insert($activity);
    }

    // Pull users from ZOHO CRM
    public function getUsers()
    {
        $setting = CrmSetting::where('id', 1)->select('access_token')->first();
        $token =$setting->access_token;
        $client = new Client();
        $URI = 'https://www.zohoapis.com/crm/v2/users';
        $debug = [
            'debug' =>true,
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $token,   
        ];
        $response = $client->get($URI, ['headers' => $headers])->getBody()->getContents(); 
        $data = json_decode($response, true);
        $count = $data['users'];
        $user_id = CrmUser::pluck('user_id');
        $user_array = (array)$user_id;
        $id = array_values($user_array);
        $user = [];
        // Insert Users in DB
        for($i=0; $i<count($count); $i++){
            $value = $count[$i];
            if(in_array($value['id'], $id[0])==false){
                $user[] = [
                    'user_id' => $value['id'],
                    'role_id' => $value['role']['id'],
                    'profile_id' => $value['profile']['id'],
                    'zuid' => $value['zuid'],
                    'profile_name' => $value['profile']['name'],
                    'role_name' => $value['role']['name'],
                    'first_name' => $value['first_name'],
                    'last_name' => $value['last_name'],
                    'full_name' => $value['full_name'],
                    'name_format' => $value['name_format'],
                    'reporting_to' => $value['Reporting_To'],                
                    'alias' => $value['alias'],        
                    'mobile' => $value['mobile'],        
                    'phone' => $value['phone'],        
                    'email' => $value['email'],        
                    'fax' => $value['fax'],        
                    'website' => $value['website'],        
                    'street' => $value['street'],        
                    'state' => $value['state'],        
                    'city' => $value['city'],        
                    'country' => $value['country'],        
                    'zip_code' => $value['zip'],        
                    'country_locale' => $value['country_locale'],        
                    'signature' => $value['signature'],        
                    'time_zone' => $value['time_zone'],        
                    'language' => $value['language'],        
                    'locale' => $value['locale'],        
                    'microsoft' => $value['microsoft'],        
                    'personal_account' => $value['personal_account'],        
                    'is_online' => $value['Isonline'],        
                    'default_tab_group' => $value['default_tab_group'],        
                    'sandbox_developer' => $value['sandboxDeveloper'],        
                    'status' => $value['status'],        
                ];
            }
        }
        CrmUser::insert($user);
    }
}
