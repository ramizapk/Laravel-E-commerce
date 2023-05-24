<?php

namespace App\Http\Controllers\site\users;

use App\Http\Controllers\Controller;
use App\Models\Addresses;

use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function add(Request $request){
        $validateData = $request->validate([
            'city'=>'required',
            'country'=>'required',
            'state'=>'required',
            'zip'=>'required',
            'address1'=>'required',
        ]);
            $add= new Addresses();
            $add->cust_id =Session()->get('LoggedUser');
            $add->city =$request->city;
            $add->country =$request->country;
            $add->state =$request->state;
            $add->zip =$request->zip;
            $add->add1 =$request->address1;
            $add->add2 =$request->address2;
            $add->save();
            return back()->with('add','new address has been created !');
     

    }
}
