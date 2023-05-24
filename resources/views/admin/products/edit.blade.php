@extends('admin.layout.master')
@section('title', 'Edit Products')

@section('content')
@if(Session::has('category-add'))
<div class="alert alert-success">
    {{Session::get('category-add')}}
</div>
@endif


<form action="{{ route('admin.products.saveEdit' ,$result->prod_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Product Name :</label>
    <input name="p_name" type="text" value="{{$result->prod_name}}">

    @error('p_name')
    <span class="text-danger">{{$message}}</span>
    @enderror


    <label>Product price :</label>
    <input name="p_price" type="number" value="{{$result->prod_price}}">

    @error('p_price')
    <span class="text-danger">{{$message}}</span>
    @enderror


    <label>Product Image :</label>
    <img src="{{ asset('images/products/'.$result->prod_image) }}">
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
    <select id="Category" name="p_section" onchange="getSubCategories(value);">
        <option value="">Select Category</option>
        @foreach($categoriesList as $key => $cat)
        <option value="{{$cat->sect_id}}" {{ $cat->sect_id==$result->sect_id ? $x='selected' : $x=''}}>{{$cat->sect_name}}</option>
        @endforeach

       @php echo "<script>
       window.onload= function(){
        var x = document.getElementById('Category');
        getSubCategories(x.value);};
        </script>";
         @endphp

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
        <option value="{{$brands->brand_id}}" {{ $brands->brand_id==$result->brand_id ? $x='selected' : $x=''}}>{{$brands->brand_name}}</option>
        @endforeach
      
    </select>

    @error('p_brand')
    <span class="text-danger">{{$message}}</span>
    @enderror


    <label>Product Description :</label>
    <textarea name="p_desc">{{$result->prod_description}}</textarea>

    @error('p_desc')
    <span class="text-danger">{{$message}}</span>
    @enderror

   
    <div class="images-upload-cont editphptos">
        <p>Other Photos :</p>
        <div class="otherphotos">


       @php
       $x=5;
       @endphp
            @foreach($result->productImages as $key => $p)
             <img src="{{ asset('images/pimages/'.$p->image) }}">
                   
                <div class="img">
                <!-- actual upload which is hidden -->
                <input type="file" name="ep_img{{$p->imag_id}}" id="actual-btn{{$x}}" hidden/>
                
                <!-- our custom upload button -->
                <label class="input-l" for="actual-btn{{$x}}">Choose File</label>
                
                <!-- name of file chosen -->
                <span id="file-chosen{{$x}}">No file chosen</span>
                </div>
                @php $x++; @endphp
            @endforeach
        </div>


        
        <div class="addp">
            
            @for($i=1; $i<=4 - $result->productImages->count(); $i++)
             
                <div class="img">
                    <!-- actual upload which is hidden -->
                    <input type="file" name="ap_img{{$i}}" id="actual-btn{{$i}}" hidden/>
                    
                    <!-- our custom upload button -->
                    <label class="input-l" for="actual-btn{{$i}}">Choose File</label>
                    
                    <!-- name of file chosen -->
                    <span id="file-chosen{{$i}}">No file chosen</span>
                    </div>
            
            @endfor
        </div>



</div>

    <button type="submit" name='add'>Edit</button>
</form>



@endsection