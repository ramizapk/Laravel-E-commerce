<?php

namespace App\Http\Controllers\site\usersaction;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CatItems;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
  
    function addToCart($productId){
     
        $product=Products::find($productId);

        if($product){

            $user =Users::with(['cart'])->find(Session()->get('LoggedUser'));
            
           $cartId=$user->cart['cart_id'];

           $list=CatItems::where([['cart_id', '=', $cartId],['prod_id' , '=', $productId]])->first();
         
           if($list){
            return 'this already in your cart';
        
           }else{
           
            $cartList = new CatItems();
            $cartList->cart_id =$cartId;
            $cartList->prod_id =$productId;
            $cartList->save();
            return 'done';
           }
   
         }
         return 'not found';
 

     
          
    }


    function showCartItems(){

        $user =Users::with(['cart','addresses'])->find(Session()->get('LoggedUser'));
            
        $cartId=$user->cart['cart_id'];
        $addresses =$user->addresses;

        $productsIdLists=CatItems::where([['cart_id', '=', $cartId],['state', '=',0 ]])->pluck('prod_id')->toArray();
     
        $result=Products::find($productsIdLists);
      
      
        return view('site.cart.index',compact('result','addresses'));
    


    }

     function GetCartItemsCount(){
        $user =Users::with(['cart'])->find(Session()->get('LoggedUser'));
            
        $cartId=$user->cart['cart_id'];

        $productsCount=CatItems::where('cart_id', '=', $cartId)->count();

        return $productsCount;

        
    }


    function deletCartItems($productId){
        $user =Users::with(['cart'])->find(Session()->get('LoggedUser'));
            
        $cartId=$user->cart['cart_id'];

       

        if(CatItems::where([['cart_id', '=', $cartId],['prod_id' , '=', $productId]])->delete()){
            return 'done';
        }
       
    }

    function saveForLatter($productId){
        $user =Users::with(['cart'])->find(Session()->get('LoggedUser'));
            
        $cartId=$user->cart['cart_id'];

        // $cartItem=CatItems::where([['cart_id', '=', $cartId],['prod_id' , '=', $productId]])->first();

        // $cartItem->state=1;
     
        // return $cartItem;
        if(CatItems::where([['cart_id', '=', $cartId],['prod_id' , '=', $productId]])->update(['state' => 1])){

            return 'done';
        }
        

    }
}
