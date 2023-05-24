@extends('admin.layout.master')
@section('title', 'Categories')

@section('content')


      
<div class="table-cont">
    <table  id="table">
     
<thead>
           
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Picture</th>
        <th>Description</th>

        <th>Subcategories Count</th>
        <th>State</th>
        <th>Actions</th>
        <th>Subcategories Actions</th>
    </tr>

   </thead>
   <tbody>
    @foreach($result as $key => $category)

    <tr>
        <td>{{ $category->sect_id }}</td>
        <td>{{ $category->sect_name }}</td>
        
        <td><img src="{{ asset('images/categories/' .$category->sect_image) }}"></td>
        <td>{{ $category->sect_description ==null ? 'No Description' : $category->sect_description}}</td>

        <td>{{ $category->subcategories->count() }}</td>

        <td>{{$category->sect_visible == 0 ? 'unavailable' : 'available'}}</td>

         <td><button onclick="display({{$category->sect_id}},this,'categories');"> {{$category->sect_visible == 0 ? 'show' : 'hide'}}</button>
             |
              <a href="/categories/edit/{{$category->sect_id}}">edit</a>
               |
                <button onclick="deleteRow({{$category->sect_id }},this,'categories','{{$category->sect_name}}');">delete</button></td>
         <td><a href='/subcategories/{{$category->sect_id }}'>Show Subcategories</a> | <a href='/subcategories/add/{{$category->sect_id }}'>Add Subcategories</a></td>
        

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