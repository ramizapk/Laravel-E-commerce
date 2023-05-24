<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('resources/admin/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/admin/css/style.css') }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<meta charset="UTF-8">

</head>


<body>





    <div class="main-Cont">


        
        <div class="left-cont" id="nav">
            <div>
             <img id="close" class="close" src=" {{ asset('resources/admin/images/close.png') }}" height="30px" width="30px" onclick="hideNav();">
                <img src=" {{ asset('resources/admin/images/profile.png') }}" height="100px">
                <p class="admin-name">{{Session::get('LoggedAdminName')}}</p>
                <p>Site Admin</p>
            </div>
            <nav>
                <a  href="/index" class="@php if(isset($indexPage)){echo $indexPage;} @endphp" >
                   
    
                   
    
                    <img src="{{ asset('resources/admin/images/dash.png') }} ">
                    <p>Dashboard</p>
                  
                </a> 
                 
           
                
                <a onclick="hideSubList('sub1');" class="@php if(isset($productsPages)){echo $productsPages;} @endphp" >
                 <img src=" {{ asset('resources/admin/images/prod.png') }}">
                 <p>Products</p>
                </a>
                <li id="sub1">
                 <a href="/products/add">
                     <img src=" {{ asset('resources/admin/images/add.png') }}">
                     <p> add Products</p>
                 </a>
                 <a href="/products">
                     <img src="{{ asset('resources/admin/images/show.png') }}">
                     <p>  Show All Products</p>
                 </a>
             </li>
             <a onclick="hideSubList('sub2');" class="@php if(isset($ctegoritesPages)){echo $ctegoritesPages;} @endphp">
                 <img src="{{ asset('resources/admin/images/cat.png') }}">
                 <p>Categories</p>
             </a>
             <li id="sub2">
                 <a href="/categories/add">
                     <img src="{{ asset('resources/admin/images/add.png') }}">
                     <p> add Categories</p>
                 </a>
                 <a href="/categories">
                     <img src="{{ asset('resources/admin/images/show.png') }}">
                     <p>  Show All Categories</p>
                 </a>
             </li>
             <a  onclick="hideSubList('sub3');" class="@php if(isset($brandsPages)){echo $brandsPages;} @endphp">
                 <img src="{{ asset('resources/admin/images/brand.png') }}">
                 <p>Brands</p>
             </a>
             <li id="sub3">
                 <a href="/brands/add">
                     <img src="{{ asset('resources/admin/images/add.png') }}">
                     <p> add Brands</p>
                 </a>
                 <a href="/brands">
                     <img src="{{ asset('resources/admin/images/show.png') }}">
                     <p>  Show All Brands</p>
                 </a>
             </li>
             <a onclick="hideSubList('sub4');" class="@php if(isset($ordersPages)){echo $ordersPages;} @endphp">
                 <img src="{{ asset('resources/admin/images/order.png') }}">
                 <p>Orders</p>
             </a>
             <li id="sub4">
                 <a>
                     <img src="{{ asset('resources/admin/images/new.png') }}">
                     <p> New Orders</p>
                 </a>
                 <a href="/orders/show">
                     <img src="{{ asset('resources/admin/images/show.png') }}">
                     <p>  Show All Orders</p>
                 </a>
             </li>   
             <a href="/logout">
                 <img src="{{ asset('resources/admin/images/logout.png') }}">
                 <p>Logout</p>
             </a>
             
            </nav>
     
        </div>











        <div class="right-cont" id="right">
            <div class="title-cont">
                <img id="list" src="{{ asset('resources/admin/images/list.png') }}" height="30px" onclick="hideNav();">
                <h1>@yield('title')</h1>
            </div>

            
            @if(Session::has('add'))
            <div class='alert_message_cont'>
                <p>   {{Session::get('add')}}</p>
                <img src={{asset('resources/admin/images/closemessage.png')}} onclick='hidemessage(this)' height='15px' width='15px'>
            </div>
            @endif

                          
               
               

            @yield('content')







        </div>




    </div>



    <script src="{{ asset('resources/admin/js/ajax.js') }}"></script>
  <script src="{{ asset('resources/admin/js/script.js') }}"></script>
</body>
</html>




















