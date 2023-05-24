@extends('admin.layout.master')
@section('title', 'Edit Categories')

@section('content')

@if(Session::has('category-add'))
<div class="alert alert-success">
    {{Session::get('category-add')}}
</div>
@endif



<form action="{{ route('admin.categories.saveEdit',$result->sect_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Category Name :</label>
    <input name="category_name" type="text" value="{{$result->sect_name}}">
   

    <label>Category Image :</label>
    <img src="{{ asset('images/categories/'.$result->sect_image) }}" height="100px" width="100px">
               <div class="img">
                      <!-- actual upload which is hidden -->
<input name="category_image" type="file" id="actual-btn" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen">No file chosen</span>
</div>

<label>Category Description :</label>
<textarea name="category_description">{{$result->sect_description}}</textarea>


    <button name="add">Edit</button>

</form>




@endsection