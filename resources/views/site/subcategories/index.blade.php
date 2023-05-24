@extends('site.layout.master')
@section('title')

{{$categoryName}}
@endsection
@section('pageName')

<a href="/categories/all">All Categories </a>&nbsp; / &nbsp;

<a href="{{$categoryId}}">{{$categoryName}}</a>
@endsection


@section('content')








<section class="top_cat">
    
    <h1 class="section_title">{{strtoupper($categoryName)}} CATEGORIES:</h1>
    <div class="top_cat_cont">

        <div class="cat">
            <div class="catelements">
                <p>All {{$categoryName}} Products</p>
                <div class="imgCont"> <img src="{{asset('resources/site/images/all.png')}}"></div>
            <a href="/categories/{{$categoryId}}/products/all">SHOP NOW </a>
        </div>
        </div>

        @foreach($result as $key => $cat)
        <div class="cat">
            <div class="catelements">
                <P> {{$cat->cate_name}}</P>
                <div class="imgCont">    <img src="{{asset('images/subcategories/'.$cat->cate_image)}}"></div>
            <a href="/categories/{{$cat->cate_id}}/products" > SHOP NOW</a>
        </div>
        </div>
        @endforeach




        
    </div>
       
   </section>












@endsection