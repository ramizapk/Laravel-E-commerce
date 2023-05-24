@extends('admin.layout.master')
@section('title', 'Add Brands')

@section('content')



<form action="{{ route('admin.brands.save') }}" method="POST" enctype="multipart/form-data">
   @csrf
    <label>Brand Name :</label>
    <input name="brand_name" type="text">
    @error('brand_name')
    <span class="text-danger">{{$message}}</span>
    @enderror


    <label>Brand Image :</label>
               <div class="img">
                      <!-- actual upload which is hidden -->
<input type="file" name="brand_image" id="actual-btn" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen">No file chosen</span>
</div>
@error('brand_image')
    <span class="text-danger">{{$message}}</span>
    @enderror




    <button name="add">Add</button>

</form>



@endsection