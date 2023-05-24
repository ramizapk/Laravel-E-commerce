<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    function login(){

        return view('site.login.index');
    }


    
    function check(Request $request){

            $request->validate([
            'email'=>'required|email',
            'pass'=>'required|min:6|max:20'
            ]);

            

         $user=Users::where('cust_email','=', $request->email)->first();
        if($user){
            if($user->cust_password == $request->pass){

                $request->session()->put('LoggedUser',$user->cust_id);
                $request->session()->put('LoggedUserName',$user->cust_fname);
                return redirect('/');
              
            }else{
                return back()->with('failpass','Invail password');
            }
        }else{
            return back()->with('failemail','no account found for this email');
        }
    }


    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            session()->pull('LoggedUserName');
            return redirect('/');
        }else{
           return redirect('/');
        }
    }


    function sginup(){
        return view('site.signup.index');
    }

}
