@extends('admin.layout.master')
@section('title', 'Orders')

@section('content')


      
<div class="table-cont">
    <table  id="table">
     
<thead>
           
    <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Transaction Id</th>

        <th>Time</th>
        <th>Total Price</th>
        <th>Actions</th>

    </tr>

   </thead>
   <tbody>
    @foreach($result as $key => $orders)

    <tr>
        <td>{{ $orders->order_id }}</td>
        <td>{{ $orders->users['cust_fname'].' '.$orders->users['cust_lname']  }}</td>
        <td>{{ $orders->transaction_id }}</td>
        <td>{{ $orders->timestamp }}</td>
        <td>${{ $orders->total_price }}</td>
       

       

       

         <td>
             <a href="/order/info/{{ $orders->order_id }}">Show Order Information</a>
             
        </td>
        

    </tr>
    @endforeach

</tbody>
<tfoot>
    <tr>
        <td  colspan='10'>Categories Count : <span id='bottomCounter'>{{$result->count()}}</span></td>
    </tr>
</tfoot>
</table>


</div>



@endsection