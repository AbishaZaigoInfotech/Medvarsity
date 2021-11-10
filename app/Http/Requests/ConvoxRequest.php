<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvoxRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ip_address' => 'required',
            'port' => 'required',
            'homepage_url' => 'required',
            'callback_url' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required',
            'access_token' => 'required',
            'session_timeout' => 'required',
            'frequency' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'ip_address.required' => 'IP address is required',
            'port.required' => 'Port is required',
            'homepage_url.required' => 'Homepage url is required',
            'callback_url.required' => 'Callback url is required',
            'client_id.required' => 'Client Id is required',
            'client_secret.required' => 'Client secret key is required',
            'access_token.required' => 'Access token is required',
            'session_timeout.required' => 'Session timeout is required',
            'frequency.required' => 'Frequency is required',
        ];
    }

}
