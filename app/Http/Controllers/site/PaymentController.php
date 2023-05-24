<?php

namespace App\Http\Controllers\site;
use App\Http\Services\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Cart;
use App\Models\CatItems;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use App\Models\transaction;

class PaymentController extends Controller
{
    private $paymentServices;
    public function __construct(Payment $paymenServices)
    {
        $this ->paymentServices = $paymenServices;
    }



    public function saveTransactionInfo($paymentData,$address){
        $invoiceId=$paymentData['Data']['InvoiceId'];
        
        $userId=Session()->get('LoggedUser');
        
        $trans = new transaction();
        $trans->invoiceId =$invoiceId;
        $trans->cust_id =$userId;
        $trans->addr_id =$address;
        $trans->save();
    }

    public function saveCartQuantity($products,$count,$cartId){
        foreach($products as  $key => $prod){
            CatItems::where([['cart_id', '=', $cartId],['state', '=',0 ],['prod_id', '=',$prod->prod_id]])->update(['quantity' => $count[$prod->prod_id]]);
        }
       
    }

    public function makeInvoiceInfo($user ,$products,$count=[]){
        $invoiceItems =array();

        $i=0;
        $totalPrice=0.0;

        $name=$user->cust_fname . ' '. $user->cust_lname;
        $email=$user->cust_email;
        $mobile=$user->cust_phone;

       foreach($products as $key => $prod){

           $invoiceItems[$i] = [
               'ItemName'  => $prod->prod_name, //ISBAN, or SKU
               'Quantity'  => $count[$prod->prod_id], //Item's quantity
               'UnitPrice' => $prod->prod_price, //Price per item
               ]; 
           
           $totalPrice+=($count[$prod->prod_id] * $prod->prod_price);
         
            $i++;
       }

       $paymentData= $this->paymentServices->sendPayment($invoiceItems,$name,$email,$mobile,$totalPrice);

       return $paymentData;
    }

    public function payOrder(Request $request){
        //get order Items
         //get user
        $user =Users::with(['cart'])->find(Session()->get('LoggedUser'));
             //get cart Id
        $cartId=$user->cart['cart_id'];
             //get product list
        $productsIdLists=CatItems::where([['cart_id', '=', $cartId],['state', '=',0 ]])->pluck('prod_id')->toArray();
           //get all product info
        $products=Products::find($productsIdLists);


        //make an array for payment to sent to payment api
        $paymentData=$this->makeInvoiceInfo($user,$products,$request->input('count'));
        //the paymentgeteway link to pay mony
        $Link=$paymentData['Data']['InvoiceURL'];

        //save cart quantity 
        $this->saveCartQuantity($products,$request->input('count'),$cartId);
        
        //transaction info to save in the transiction table
        $address=$request->address;
        $this->saveTransactionInfo($paymentData,$address);

         //redirect into pay link
        return redirect()->to($Link);
    }



    public function makeOrder($InvoiceId,$totalPrice){
        $tran=transaction::where('invoiceId' , $InvoiceId)->first();
       
        if($tran){
        //    var_dump($tran->cust_id);
            $userId= $tran->cust_id;
            $user =Users::with(['cart'])->find($userId);
            $cartId=$user->cart['cart_id'];
            $cartList=CatItems::where([['cart_id', '=', $cartId],['state', '=',0 ]])->get();

            //create order
            $order =new Orders();
            $order->cust_id=$userId;
            $order->transaction_id=$tran->transaction_id;
            $order->addr_id=$tran->addr_id;
            $order->total_price=$totalPrice;
            $order->save();

            $orderId=$order->order_id;
            foreach($cartList as  $key => $list){
                //fill order items
             $orderItems=new OrderItems();
             $orderItems->order_id=$orderId;
             $orderItems->prod_id=$list->prod_id;
             $orderItems->quantity=$list->quantity;
             $orderItems->description=$list->description;
             //delete from cart
             if($orderItems->save()){
             CatItems::where([['cart_id', '=', $cartId],['state', '=',0 ],['prod_id', '=',$list->prod_id ]])->delete();
             }
            }

           return true;


        }
    }

    public function payDone(Request $request){
       // return $request;
            //   dd($request);
       
       
        $data=[];
        $data['Key']=$request->paymentId;
        $data['KeyType']='paymentId';
        
        $paymentData= $this->paymentServices->getPaymentStatus($data);

        $InvoiceId= $paymentData['Data']['InvoiceId'];

        $totalPrice= $paymentData['Data']['InvoiceDisplayValue'];
        $totalPrice=(float)str_replace(",","",str_replace(" USD","",$totalPrice));
     //    var_dump($InvoiceId);
       if($this->makeOrder($InvoiceId,$totalPrice)){
        
        return redirect()->route('user.cart.show');
       }else{
        return redirect('/user/cart');
       }
        
       
    }
    
}
