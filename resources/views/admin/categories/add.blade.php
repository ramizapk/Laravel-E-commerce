@extends('admin.layout.master')
@section('title', 'Add Categories')

@section('content')

@if(Session::has('category-add'))
<div class="alert alert-success">
    {{Session::get('category-add')}}
</div>
@endif



<form action="{{ route('admin.categories.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Category Name :</label>
    <input name="category_name" type="text">
    @error('category_name')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <label>Category Image :</label>
               <div class="img">
                      <!-- actual upload which is hidden -->
<input name="category_image" type="file" id="actual-btn" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen">No file chosen</span>
</div>
@error('category_image')
    <span class="text-danger">{{$message}}</span>
    @enderror
<label>Category Description :</label>
<textarea name="category_description"></textarea>
@error('category_description')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <button name="add">Add</button>

</form>




@endsection