<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;

class GoogleController extends Controller
{
    // Redirecting to Gmail login page
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            // Already existing user
            if($findUser){
                Auth::login($findUser);
                return redirect('/crm/index');
            }else{
                // Registering new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('password'),
                ]);
                Auth::login($newUser);
                return redirect('/crm/index');
            }
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }
}
