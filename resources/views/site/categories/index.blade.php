@extends('site.layout.master')
@section('title', 'All Categories')
@section('pageName')


<a href="/categories/all">All Categories </a>
@endsection


@section('content')








<section class="top_cat">
    <h1 class="section_title">All CATEGORIES:</h1>
    <div class="top_cat_cont">

        @foreach($getAllCategories as $key => $cat)
        {{-- <div class="cat">
            <img src="{{asset('images/categories/'.$cat->sect_image)}}">
            <a href="/categories/{{$cat->sect_id}}" > {{$cat->sect_name}}</a>
        </div> --}}

        <div class="cat ">
            <div class="catelements">
             <p>{{$cat->sect_name}}</p>
           <div class="imgCont">  <img src="{{asset('images/categories/'.$cat->sect_image)}}"></div>
              <a href="/categories/{{$cat->sect_id}}" > SHOP NOW</a>
          </div>
         </div>
        @endforeach




        
    </div>
       
   </section>












@endsection