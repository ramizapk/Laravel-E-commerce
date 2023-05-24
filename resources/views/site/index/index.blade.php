@extends('site.layout.masterwithimage')
@section('title', 'HOME')



@section('content')






<div class="first_part">
    <div class="texts">
    <h6>THE BEST CHOICE FOR</h6>
    <h1>ONLINE SHOPPING</h1>
    <h3>IS OUR STORE</h3>
    <a href="#">GET START</a>
</div>
</div>


<section class="top_cat">
 <h1 class="section_title">TOP CATEGORIES:</h1>
 <div class="top_cat_cont carousel" data-flickity='{ 
   "groupCells": true  ,
  "autoPlay": true,
 "freeScroll": true,
"pauseAutoPlayOnHover": false,
"percentPosition": false,
 "prevNextButtons": false,
 "pageDots": false,
 "wrapAround": true}'>

   

 @foreach($lastCategories as $key => $cat)

 <div class="cat carousel-cell">
   <div class="x"></div>
   <div class="catelements">
    <p>{{$cat->sect_name}}</p>
  <div class="imgCont">  <img src="{{asset('images/categories/'.$cat->sect_image)}}"></div>
  <div class="x">  <a href="/categories/{{$cat->sect_id}}" > SHOP NOW</a></div>
 </div>
</div>
 @endforeach
 @foreach($lastCategories as $key => $cat)

 <div class="cat carousel-cell">
  
  <div class="catelements">
    <p>{{$cat->sect_name}}</p>
  <div class="imgCont"> <img src="{{asset('images/categories/'.$cat->sect_image)}}"></div>
  <div class="x"> <a href="/categories/{{$cat->sect_id}}" > SHOP NOW</a></div>
 </div>
 </div>
 @endforeach

    

  






    </div>
</section>


<section class="offer">

</section>


<section class="last_products">
 <h1 class="section_title">LAST PRODUCTS:</h1>
 <div class="products_cont carousel" data-flickity='{ 
  "groupCells": true  ,
 "autoPlay": true,
"freeScroll": true,
"pauseAutoPlayOnHover": false,
"percentPosition": false,
"prevNextButtons": false,
"pageDots": false,
"wrapAround": true}' >
@foreach($lastProducts as $key => $prod)
  <div class="product_card carousel-cell">
 
    <i class="{{App\Http\Controllers\site\usersaction\LoveController::checkIsLove($prod->prod_id) =='no' ? 'far':'fas';}} fa-heart love" onclick="wishList(this,{{$prod->prod_id}});" ></i>

   <div class="imgCont"><img src="{{asset('images/products/'.$prod->prod_image)}}"></div> 
      <a href="/product/{{$prod->prod_id}}" class="p_name">{{$prod->prod_name}}</a>
      <p class="p_price">${{$prod->prod_price}}</p>
      <button onclick="addToCart({{$prod->prod_id}});"><i class="fas fa-cart-arrow-down"></i> add to cart</button>
  </div>
  @endforeach

 </div>
</section>

<section class="products">
 <h1 class="section_title" > OTHER:</h1>
  <div class="seg_cont">
      <p class="sel">suggested to you</p>
      <p>top rated</p>
      <p>most watched</p>
      <p>top selling</p>
      <p>discount & offers</p>
  </div>







 <div class="products_cont">


  @foreach($allProducts as $key => $allprod)

    <div class="product_card">
        <i class="far fa-heart love" onclick="love(this);"></i>
        <div class="imgCont">    <img src="{{asset('images/products/'.$allprod->prod_image)}}"></div>
          <a href="/product/{{$allprod->prod_id}}" class="p_name">iphone x</a>
          <p class="p_price">${{$allprod->prod_price}}</p>
          <button onclick="addToCart({{$allprod->prod_id}});"><i class="fas fa-cart-arrow-down"></i> add to cart</button>
      </div>

      @endforeach

    </div>
</section>




<section class="brands">
  <h1 class="section_title" > BRANDS:</h1>
  <div class="brands_cont carousel" data-flickity='{ 
    "groupCells": true  ,
   "autoPlay": true,
  "freeScroll": true,
 "pauseAutoPlayOnHover": false,
 "percentPosition": false,
  "prevNextButtons": false,
  "pageDots": false,
  "wrapAround": true}'>

  @foreach($lastBrands as $key => $brand)
    <div class="brand carousel-cell">
      <div class="brand_pic">
             <img src="{{asset('images/brands/'.$brand->brand_image)}}">
      </div>
      <a href="/brands/{{$brand->brand_id}}/products">{{$brand->brand_name}}</a>
    </div>
    @endforeach


 





  </div>

</section>









@endsection