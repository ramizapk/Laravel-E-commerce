<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;

use App\Models\Amins;

class AuthController extends Controller
{
    //
    function login(){

        return view('admin.auth.login');
    }



     function check(Request $request){

        $request->validate([
         'email'=>'required|email',
         'pass'=>'required|min:6|max:20'
        ]);


        $admin=Admins::where('admin_email','=', $request->email)->first();
        if($admin){
            if($admin->admin_pass == $request->pass){

                $request->session()->put('LoggedAdmin',$admin->admin_id);
                $request->session()->put('LoggedAdminName',$admin->admin_name);
                return redirect('/index');
            }else{
                return back()->with('failpass','Invail password');
            }
        }else{
            return back()->with('failemail','no account found for this email');
        }
     }

     function adminProfile(){
         $indexPage='sel';
         return view('admin.index',compact('indexPage'));
     }

     function logout(){
         if(session()->has('LoggedAdmin')){
             session()->pull('LoggedAdmin');
             return redirect('/login');
         }else{
            return redirect('/index');
         }
     }

}
