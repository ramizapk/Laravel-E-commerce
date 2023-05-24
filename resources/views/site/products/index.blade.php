@extends('site.layout.master')
@section('title')
{{$pageName}} Products
@endsection
@section('pageName')


@foreach($linkName as $index => $name)

<a href="{{$linkUrl[$index]}}">{{$name}} </a>
@if($index < count($linkUrl)-1)
&nbsp; / &nbsp;
@endif
@endforeach
@endsection


@section('content')









<div class="products_cont">


  
  @foreach($result as $key => $prod)
    <div class="product_card">
        <i class="far fa-heart love" onclick="love(this);"></i>
        <div class="imgCont"> <img src="{{asset('images/products/'.$prod->prod_image)}}"></div>
        <a href="/product/{{$prod->prod_id}}" class="p_name">{{$prod->prod_name}}</a>
        <p class="p_price">${{$prod->prod_price}}</p>
          <button><i class="fas fa-cart-arrow-down"></i> add to cart</button>
      </div>


      @endforeach
     


             
              


                 
                   

                     


                         
                          


                                 
                                   

                                     
                                       
                                         




     


         





                     


                         
                         
                                   
                                       
</div>

</section>












@endsection