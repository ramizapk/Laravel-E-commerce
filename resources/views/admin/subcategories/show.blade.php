@extends('admin.layout.master')
@section('title', 'SubCategories')

@section('content')

     
<div class="table-cont">
    <table  id="table">


        <thead>
           
            <tr>
                <th>ID</th>
                    <th>Category Name</th>
                
                    
                    
                    <th>Picture</th>
                    <th>Description</th>
                    
                    <th>State</th>
                    <th>Actions</th>
            </tr>
        
           </thead>
           <tbody>
      
            @foreach($result as $key => $subcategory)
        
            <tr>
                <td>{{ $subcategory->cate_id }}</td>
                <td>{{ $subcategory->cate_name }}</td>
                
                <td><img src="{{ asset('images/subcategories/' .$subcategory->cate_image) }}"></td>
                <td>{{ $subcategory->cate_description  ==null ? 'No Description' : $subcategory->cate_description }}</td>
        
               
        
                <td>{{$subcategory->cate_visible == 0 ? 'unavailable' : 'available'}}</td>
        
                 <td>
                     <button onclick="display({{$subcategory->cate_id}},this,'subcategories');"> {{$subcategory->cate_visible == 0 ? 'show' : 'hide'}}</button>
                      | 
                      <a href="/subcategories/edit/{{$subcategory->cate_id}}">edit</a>
                       |
                        <button onclick="deleteRow({{$subcategory->cate_id}},this,'subcategories','{{$subcategory->cate_name}}');">delete</button></td>
             
                
        
            </tr>
            @endforeach
        
        </tbody>
        <tfoot>
            <tr>
                <td colspan='10'>Categories Count : <span id='bottomCounter'>{{$result->count()}}</span></td>
            </tr>
        </tfoot>



    </table>


</div>



@endsection