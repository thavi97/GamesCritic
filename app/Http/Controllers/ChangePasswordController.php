<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ChangePasswordController extends Controller
{
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
     public function index()
     {
       if(Auth::user()){
         return view('auth/passwords/change_password');
       }else{
         return redirect('/new_games');
       }
     }


     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       $user = Auth::user();
       $user->password = Hash::make($request->input('password'));
       $user->save();
       return redirect('/profile');
     }

     protected function validator(array $data)
     {
         return Validator::make($data, [
             'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
     }

}
