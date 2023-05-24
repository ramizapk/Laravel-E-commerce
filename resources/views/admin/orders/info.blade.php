@extends('admin.layout.master')
@section('title', 'Order info')

@section('content')


      <div class="order_info">
          <h1>Order Info</h1>
          <p>User Name : {{$orderInfo->users['cust_fname'] . ' ' .$orderInfo->users['cust_lname']}}</p>
          <p>User Email : {{$orderInfo->users['cust_email']}}</p>
          <p>User Phone : {{$orderInfo->users['cust_phone']}}</p>
          <p>Address : asdasd</p>
          <p>Total Price : ${{$orderInfo->total_price}}</p>

        
      </div>
<div class="table-cont">
    <h1>Items Info</h1>
    <table  id="table">
     
<thead>
           
    <tr>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Piece Price</th>

        <th>Quantity</th>
        <th>Total Price</th>
      

    </tr>

   </thead>
   <tbody>
       @php $x=0;   @endphp
    @foreach($products as $key => $prod)

    <tr>
        <td><img src="{{ asset('images/products/'.$prod->prod_image) }}"></td>
        <td>{{ $prod->prod_name}}</td>
        <td>${{ $prod->prod_price}}</td>
        <td>{{ $quantity[$x]}}</td>
        <td>${{ $prod->prod_price * $quantity[$x]}}</td>

       

       

        
        

    </tr>
    @php $x++;   @endphp
    @endforeach

</tbody>

<tfoot>
    <tr>
        <td  colspan='10'>Total Price : <span id='bottomCounter'> ${{$orderInfo->total_price}}</span></td>
    </tr>
</tfoot>
</table>


</div>



@endsection