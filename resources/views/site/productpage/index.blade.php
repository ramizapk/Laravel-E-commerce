
@extends('site.layout.productmaster')
@section('title', 'Product')



@section('content')











<div class="product-info-cont">

    <div class="product_images_cont_left">
        
        <div id="carousel-a"  class="main-image carousel js-flickity"  
        data-flickity='{
             "pageDots": false ,
              "prevNextButtons": false ,
              "fullscreen": true,
               "lazyLoad": 1 ,
                "groupCells": 1 }'>
                <div class="carousel-cell">
            <img class="carousel-cell-image" data-flickity-lazyload="{{asset('images/products/'.$result->prod_image)}}">
            </div>
            @foreach($result->productImages as $key => $photo)
            <div class="carousel-cell">
                <img class="carousel-cell-image" data-flickity-lazyload="{{asset('images/pimages/'.$photo->image)}}">
                </div>
            @endforeach
           
            
        </div>
        
        <div id="carousel-b" class="image-group-cont carousel js-flickity "
          data-flickity='{ "pageDots": false , "prevNextButtons": false, "asNavFor": "#carousel-a", "contain": true }'>
          <img class="cell" src="{{asset('images/products/'.$result->prod_image)}}">
          @foreach($result->productImages as $key => $photo)
          <img class="cell" src="{{asset('images/pimages/'.$photo->image)}}">
          @endforeach
            
           
        </div>

    </div>

 <div class="product_info_cont_right">
    <h1>{{$result->prod_name}}</h1>
    
    <div class="rating">

        <div id="dataReadonlyReview"
        data-rating-stars="5"
        data-rating-readonly="true"
        data-rating-value="3"
        data-rating-input="#dataReadonlyInput">

     
    
    </div>
    <span>  172,928 ratings </span>

    </div>
    <p>Price : ${{$result->prod_price}}</p>
    <p>Detils :</p>
    <span>
       {{$result->prod_description}}
    </span>

  

    <form>
        <div>
        <label>Quantity :</label>
        <input type="number">
    </div>

     
    <div>
        <button><i class="fas fa-cart-arrow-down"></i>Add To Cart</button>
        <button><i class="fas fa-heart"></i>Add To WishList</button>
      
      </div>
    </form>
 </div>


</div>




<div class="comments-cont">

    <h1>Reviws :</h1>

    <div class="comments-card">
        <p class="name">ramiz ali</p>
        <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus officiis id fuga, magni aperiam est doloribus velit debitis libero animi quia quibusdam soluta dignissimos natus, quo expedita harum maxime!</p>
    </div>
    <div class="comments-card">
        <p class="name">ramiz ali</p>
        <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus officiis id fuga, magni aperiam est doloribus velit debitis libero animi quia quibusdam soluta dignissimos natus, quo expedita harum maxime!</p>
    </div>
    <div class="comments-card">
        <p class="name">ramiz ali</p>
        <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus officiis id fuga, magni aperiam est doloribus velit debitis libero animi quia quibusdam soluta dignissimos natus, quo expedita harum maxime!</p>
    </div>
    <div class="comments-card">
        <p class="name">ramiz ali</p>
        <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus officiis id fuga, magni aperiam est doloribus velit debitis libero animi quia quibusdam soluta dignissimos natus, quo expedita harum maxime!</p>
    </div>
    <div class="comments-card">
        <p class="name">ramiz ali</p>
        <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus officiis id fuga, magni aperiam est doloribus velit debitis libero animi quia quibusdam soluta dignissimos natus, quo expedita harum maxime!</p>
    </div>
    <div class="comments-card">
        <p class="name">ramiz ali</p>
        <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus officiis id fuga, magni aperiam est doloribus velit debitis libero animi quia quibusdam soluta dignissimos natus, quo expedita harum maxime!</p>
    </div>
    <div class="comments-card">
        <p class="name">ramiz ali</p>
        <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus officiis id fuga, magni aperiam est doloribus velit debitis libero animi quia quibusdam soluta dignissimos natus, quo expedita harum maxime!</p>
    </div>

    <button class="view-more">view more ...</button>


    <div class="make-comment">
        <p>Make a review </p>
        
        <form>
            <div>
                <p>Rate This Product Now </p>

                <div id="dataReview">
            </div>
    
                
    
            </div>
            <label>Write a comment :</label>
            <textarea  placeholder="write yout comment here ..."></textarea>
            <button> Add Comment </button>
        </form>
        
    </div>
</div>


@endsection