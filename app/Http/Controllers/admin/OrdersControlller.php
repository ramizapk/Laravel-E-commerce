<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Http\Request;

class OrdersControlller extends Controller
{
    public function show(){
        $ordersPages="sel";
        $result=Orders::with(['users'])->get();
       
         
          return view('admin.orders.show', compact('result','ordersPages'));
      
            
      }



      public function showOrdersInfo($id){
        $ordersPages="sel";
        $orderInfo=Orders::with(['users'])->find($id);
        $orderItems=OrderItems::where('order_id', '=', $id)->pluck('prod_id')->toArray();
        $quantity=OrderItems::where('order_id', '=', $id)->pluck('quantity')->toArray();
        $products=Products::find($orderItems);
         
       
         
          return view('admin.orders.info', compact('orderInfo','products','ordersPages','quantity'));
      
            
      }
}
