@extends('admin.layout.master')
@section('title', 'Add Sub Categories')

@section('content')

@if(Session::has('sub-add'))
<div class="alert alert-success">
    {{Session::get('sub-add')}}
</div>
@endif




<form action="{{ route('admin.subcategories.save' ,$sect_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Category Name :</label>
    <input name="sub_category_name" type="text">
    @error('sub_category_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <label>Category Image :</label>
               <div class="img">
                      <!-- actual upload which is hidden -->
<input name="sub_category_image" type="file" id="actual-btn" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen">No file chosen</span>
</div>
@error('sub_category_image')
    <span class="text-danger">{{$message}}</span>
    @enderror
<label>Category Description :</label>
<textarea name="sub_category_description"></textarea>
@error('sub_category_description')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <button name="add">Add</button>

</form>



@endsection