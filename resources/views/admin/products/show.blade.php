@extends('admin.layout.master')
@section('title', 'Products')

@section('content')



    
<div class="table-cont">
    <table  id="table">
     
<thead>
           
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Section</th>
        <th>Brand</th>

        <th>Picture</th>
        <th>Description</th>
        <th>Max Conut</th>
        <th>State</th>
        <th>Actions</th>
    </tr>

   </thead>
   <tbody>




    @foreach($result as $key => $product)

    <tr>
        <td>{{ $product->prod_id }}</td>
        <td>{{ $product->prod_name }}</td>
        <td>${{ $product->prod_price }}</td>
        <td>{{ $product->category['sect_name'] }}</td>
        <td>{{ $product->brands['brand_name'] ==null ? 'not Select' : $product->brands['brand_name'] }}</td>
        <td><img src="{{ asset('images/products/'.$product->prod_image) }}"></td>
        <td>{{ $product->prod_description }}</td>

        <td>{{ $product->prod_max_no }}</td>

        <td>{{$product->prod_visible == 0 ? 'unavailable' : 'available'}}</td>

         <td><button onclick="display({{$product->prod_id}},this,'products');"> {{$product->prod_visible == 0 ? 'show' : 'hide'}}</button>
             | 
             <a href="products\edit\{{$product->prod_id}}">edit</a> 
             |
              <button onclick="deleteRow({{ $product->prod_id}},this,'products','{{$product->prod_name}}');">delete</button></td>
      
        

    </tr>
    @endforeach





    
</tbody>
<tfoot>
    <tr>
        <td colspan='10'>Products Count : <span id='bottomCounter'>{{$result->count()}}</span></td>
    </tr>
</tfoot>
</table>


</div>











@endsection