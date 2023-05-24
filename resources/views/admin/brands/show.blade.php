@extends('admin.layout.master')
@section('title', 'Brands')

@section('content')

<div class="table-cont">
    <table  id="table">
        <thead>
           
            <tr>
                <th>ID</th>
                <th>Brand Name</th>
              
               
               
                <th>Picture</th>
                
                <th>State</th>
                <th>Actions</th>
            </tr>
      
           </thead>


           <tbody>

         @foreach($result as $key => $brands)
             
      
            <tr>
                <td>{{ $brands->brand_id }}</td>
                <td>{{ $brands->brand_name }}</td>
                <td> <img src="{{ asset('images/brands/' .$brands->brand_image) }}"> </td>
                
                    
                
                <td> {{$brands->brand_visible == 0 ? 'unavailable' : 'available'}} </td>
                <td>
                    <button onclick="display({{$brands->brand_id}},this,'brands');"> {{$brands->brand_visible == 0 ? 'show' : 'hide'}}</button>
                     | <a href="\brands\edit\{{$brands->brand_id}}">edit</a>
                      | <button onclick="deleteRow({{$brands->brand_id}},this,'brands','{{$brands->brand_name}}');">delete</button></td>
               
            
            
            </tr>

            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td  colspan='10'>Brands Count : <span id='bottomCounter'>{{$result->count()}}</span></td>
            </tr>
        </tfoot>



    </table>


</div>




@endsection




