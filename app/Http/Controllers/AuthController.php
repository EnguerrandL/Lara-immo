<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestAuthForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(){



        return view('auth.login');
    }


    public function doLogin( RequestAuthForm $request)  {

       $credentials =  $request->validated(); 

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->intended(route('admin.index'))
            ->with(['success' => 'Vous êtes maintenant connecté', 'alert-class' => 'success']);
        }

        return back()->withErrors(
            [
                'email' => 'Il y a une couille dans le potage',
                'password' => 'Il y a une couille dans le potage'
            ]
        )->onlyInput('email');
    }


    public function logout(){
        Auth::logout();

        return to_route('admin.login')
        ->with(['success' => 'Vous avez été déconnecté', 'alert-class' => 'warning']); 
    }



}
