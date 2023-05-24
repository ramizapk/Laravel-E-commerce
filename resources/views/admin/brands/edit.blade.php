@extends('admin.layout.master')
@section('title', 'Edit Brands')

@section('content')



<form action="{{ route('admin.brands.saveEdit',$result->brand_id) }}" method="POST" enctype="multipart/form-data">
   @csrf
   
    <label>Brand Name :</label>
    <input name="brand_name" type="text" value="{{ $result->brand_name }}">



    <label>Brand Image :</label>
    <img src="{{ asset('images/brands/' .$result->brand_image) }}" height="100px" width="100px">
               <div class="img">
                      <!-- actual upload which is hidden -->
<input type="file" name="brand_image" id="actual-btn" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen">No file chosen</span>
</div>





    <button name="edit">Edit</button>

</form>



@endsection