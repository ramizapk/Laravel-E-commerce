@extends('admin.layout.master')
@section('title', 'Edit Sub Categories')

@section('content')

@if(Session::has('sub-add'))
<div class="alert alert-success">
    {{Session::get('sub-add')}}
</div>
@endif




<form action="{{ route('admin.subcategories.saveEdit' ,$result->cate_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Category Name :</label>
    <input name="sub_category_name" type="text" value="{{$result->cate_name}}">
   
    <label>Category Image :</label>
    <img src="{{ asset('images/subcategories/'.$result->cate_image) }}" height="100px" width="100px">
               <div class="img">
                      <!-- actual upload which is hidden -->
<input name="sub_category_image" type="file" id="actual-btn" hidden/>


<!-- our custom upload button -->
<label class="input-l" for="actual-btn">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen">No file chosen</span>
</div>

<label>Category Description :</label>
<textarea name="sub_category_description">{{$result->cate_description}}</textarea>


    <button name="edit">Edit</button>

</form>



@endsection