@extends('site.layout.master')
@section('title', 'user page')
@section('pageName')

<a href="/user">User Page </a>&nbsp; / &nbsp;
<a href="/user/cart">Cart </a>
@endsection


@section('content')








<section class="cart-page-cont">
    <h1 class="cart-page-title">Shopping Cart</h1>  
    <div class="cart-elements-cont">
    <div class="cart-table">
  

  <form action="{{ route('user.payment.go') }}" method="POST">
    @csrf  
    @foreach($result as $key => $cart)
     
        <div class="cart-item">

            <div class="first-cont">
                     <img src="{{ asset('images/products/'.$cart->prod_image) }}">
         
                      <div class="text">
                    <p>{{$cart->prod_name}}</p>
                    <p class="table-price">${{$cart->prod_price}}</p>
                     
                    <p>Qty:</p>
                    
                  <div class="cart-counter">
                      
                      <button  type="button" onclick="cartItemAdd(this,'decrease', {{ $cart->prod_max_no == 0 ? 1000000 : $cart->prod_max_no}} , {{$cart->prod_price}});">-</button>
                      <input name='count[{{$cart->prod_id}}]' type="number" value="1" min="1" max="{{ $cart->prod_max_no == 0 ? 1000000 : $cart->prod_max_no}}">
                      <button  type="button" onclick="cartItemAdd(this,'increase', {{ $cart->prod_max_no == 0 ? 1000000 : $cart->prod_max_no}} , {{$cart->prod_price}});">+</button>
                  </div>
                  <button type="button" onclick="saveForLatter(this,{{$cart->prod_id}},{{$cart->prod_price}});"><i class="fas fa-bookmark"></i> Save For Fatter</button>
              </div>
              </div>
  
                      
            
         
  
                      
      


                    
                      <button type="button" class="delete" onclick="deleteFromCart(this,{{$cart->prod_id}},{{$cart->prod_price}});"><i class="fas fa-times" onclick="deleteFromCart({{$cart->prod_id}});"></i></button>
                      
                     
      </div>



                  

    @endforeach  
                   
                 


            
    </div>
    @if(!$result->isEmpty())
    <div class="cart-order-info">
        <h1>ORDER SUMMARY</h1>
        <div><p>CART ITEMS</p><p class="itemsCount">{{$result->count()}}</p></div>
        <div><p>PRICE</p><p class="totalprice">${{$result->sum('prod_price')}}</p></div>
        <select name="address">
            @foreach($addresses as $key => $add)
                
     
            <option value="{{$add->addr_id}}" >{{$add->city . ' / ' .$add->state .' / '.$add->add1}}</option>
           
            @endforeach
        </select>
        <div><p>ALL PIECES</p><p class="allPiecces">{{$result->count()}}</p></div>
        <div><p>TOTAL COST</p><p class="totalprice">${{$result->sum('prod_price')}}</p></div>
        
        <button type="submit">CHECKOUT</button>
    </div>
    @endif
    </form>
     
    
   

</div>


@if($result->isEmpty())
 <div class="isEmpty">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
  <p>The Cart IS Epty</p>
</div>
  @endif 
<a href="/" class="aftertable">CONTINUE SHOPPING</a>

</section>















@endsection