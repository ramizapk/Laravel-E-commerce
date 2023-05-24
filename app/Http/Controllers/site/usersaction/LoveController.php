<?php

namespace App\Http\Controllers\site\usersaction;

use App\Http\Controllers\Controller;
use App\Models\Wishlists;
use App\Models\Wishlistsitems;
use Illuminate\Http\Request;

class LoveController extends Controller
{
   function checkIsLove($p_id){
       if(Session()->get('LoggedUser')){
       $x = Wishlists::where('cust_id',Session()->get('LoggedUser'))->first();
       $w=Wishlistsitems::where([['wish_id',$x->wish_id],['prod_id',$p_id]])->first();
       if($w){

        return 'yes';
       }else{
           return 'no';
       }
    }else{
        return 'no';
    }
   }


   function add($p_id){
    if(Session()->get('LoggedUser')){
        $x = Wishlists::where('cust_id',Session()->get('LoggedUser'))->first();
        $w=Wishlistsitems::where([['wish_id',$x->wish_id],['prod_id',$p_id]])->first();
        if($w){
            Wishlistsitems::where([['wish_id',$x->wish_id],['prod_id',$p_id]])->delete();
            return 'delete';
        }else{

            Wishlistsitems::insert([
              'wish_id'=>$x->wish_id,
              'prod_id'=>$p_id
            ]);
            return 'done';
        }
    }

   }
}
