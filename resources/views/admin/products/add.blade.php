@extends('admin.layout.master')
@section('title', 'Add Products')

@section('content')
@if(Session::has('category-add'))
<div class="alert alert-success">
    {{Session::get('category-add')}}
</div>
@endif


<form action="{{ route('admin.products.save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Product Name :</label>
    <input name="p_name" type="text">

    @error('p_name')
    <span class="text-danger">{{$message}}</span>
    @enderror


    <label>Product price :</label>
    <input name="p_price" type="number">

    @error('p_price')
    <span class="text-danger">{{$message}}</span>
    @enderror


    <label>Product Image :</label>
   <div class="img">
          <!-- actual upload which is hidden -->
<input type="file" id="actual-btn" name="p_main_img" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen">No file chosen</span>
</div>

@error('p_main_img')
<span class="text-danger">{{$message}}</span>
@enderror



    <label>Maximum Count :</label>
    
    <select name="p_max_count" >
        <option value="0">Unlimited</option>
        <option value="1">1</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="500">500</option>
        <option value="1000">1000</option>
    </select>

    @error('p_max_count')
    <span class="text-danger">{{$message}}</span>
    @enderror



    <label>Select Category  :</label>
    <select name="p_section" onchange="getSubCategories(value);">
        <option value="">Select Category</option>
        @foreach($categoriesList as $key => $cat)
        <option value="{{$cat->sect_id}}">{{$cat->sect_name}}</option>
        @endforeach
       
    </select>

    @error('p_section')
    <span class="text-danger">{{$message}}</span>
    @enderror



    <div id=subcat style="order:1;">
    
    </div>
   
      
 
    <label>Select Brand :</label>
    <select name="p_brand">
        <option value="0">No Brand</option>
        @foreach($brandsList as $key => $brands)
        <option value="{{$brands->brand_id}}">{{$brands->brand_name}}</option>
        @endforeach
      
    </select>

    @error('p_brand')
    <span class="text-danger">{{$message}}</span>
    @enderror


    <label>Product Description :</label>
    <textarea name="p_desc"></textarea>

    @error('p_desc')
    <span class="text-danger">{{$message}}</span>
    @enderror

   
    <div class="images-upload-cont">
        <p>If you wont uppload More photos :</p>
    <div class="img">
        <!-- actual upload which is hidden -->
<input type="file" name="p_img1" id="actual-btn1" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn1">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen1">No file chosen</span>
</div>

<div class="img">
<!-- actual upload which is hidden -->
<input type="file" name="p_img2" id="actual-btn2" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn2">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen2">No file chosen</span>
</div>

<div class="img">
<!-- actual upload which is hidden -->
<input type="file" name="p_img3" id="actual-btn3" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn3">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen3">No file chosen</span>
</div>

<div class="img">
<!-- actual upload which is hidden -->
<input type="file" name="p_img4" id="actual-btn4" hidden/>

<!-- our custom upload button -->
<label class="input-l" for="actual-btn4">Choose File</label>

<!-- name of file chosen -->
<span id="file-chosen4">No file chosen</span>
</div>

</div>

    <button name='add'>Add</button>
</form>



@endsection