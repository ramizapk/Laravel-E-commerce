<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
   
    <link rel="stylesheet" href="{{ asset('resources/site/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/site/lap/fontawesome/css/all.min.css') }}">
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    
</head>


<body>
    <header id="navbar" class="page-sticky"> 
      <div class="naviconcont">
         <i id="navicon" class="navicon fas fa-bars" onclick="mobileNavLinks();"></i>
      </div> 
     
        @if(session()->has('LoggedUser'))
        <nav id='navlinks'>
          <ul>
              <li><a href="/">INDEX</a></li>
              <li><a href="/categories/all">CATEGORY</a></li>
              <li><a href="/about">ABOUT US</a></li>
              <li><a href="#">CUSTOMER SERVICE</a></li>
              <li><a href="/contact">CONTACT</a></li>
          </ul>
      </nav>
        <div class="icons">
         
          <div class="searchcont">
            <div class="searchbox">
           <input style='display:none' id='searchBar' class="search" oninput="search(this.value);" name='search' type='search' placeholder='Search&hellip;'>
           <i class="fas fa-search" onclick="searchState();"></i>
         </div>
         <div class="searchitems" id="searchitems">
          
           
         </div>
         </div>

          <a href="/user/cart"> <i class="cart-icon fas fa-shopping-bag">
            <p>{{App\Http\Controllers\site\usersaction\CartController::GetCartItemsCount();}}</p>
          </i></a>

          <i class="user-icon fas fa-user-circle" onclick="userBox();">

            <div id='user-box'>

              <i class="fas fa-user-circle"></i>
              <p>hellow {{Session::get('LoggedUserName')}}</p>
              <a href="#">My Account</a>
              <a href="/logout">Logout</a>

            </div>

          </i>
        </div>

        @else
        <nav id='navlinks'>
          <ul>
              <li><a href="/">INDEX</a></li>
              <li><a href="/categories/all">CATEGORY</a></li>
              <li><a href="/login">LOGIN</a></li>
              <li><a href="/about">ABOUT US</a></li>
              <li><a href="#">CUSTOMER SERVICE</a></li>
              <li><a href="/contact">CONTACT</a></li>
          </ul>
      </nav>


        <div class="icons">
         
          <div class="searchcont">
            <div class="searchbox">
           <input style='display:none' id='searchBar' class="search" oninput="search(this.value);" name='search' type='search' placeholder='Search&hellip;'>
           <i class="fas fa-search" onclick="searchState();"></i>
         </div>
         <div class="searchitems" id="searchitems">
          
           
         </div>
         </div>

          <a href="#"> <i class="cart-icon fas fa-shopping-bag">
            <p>0</p>
          </i></a>

          
          </i>
        </div>
        @endif

    </header>


    <section class="top-links">
        <a href="/">Home Page </a>&nbsp; / &nbsp;   @yield('pageName') 
    </section>




<div id='newMessage' class="newMessage">

</div>


@if(Session::has('bigmessage')) 


<div id='bigmessage' class="paymentMessageCont">
  <div class="paymentMessage">
      <div class="mhead"><p>Message</p> <i class="fa fa-times" aria-hidden="true" onclick="closeBigMessage();"></i></div>
      <div class="mbody"> {{Session::get('bigmessage')}}</div>
  </div>
  </div>

  @endif

    @yield('content')












    <footer>
        <div class="flooter_links">
        <ul>
          <h1>Get to Know Us</h1>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Investor Relations</a></li>
          <div class="footer_img">
            <i class="fab fa-facebook-f"></i>
          
          <i class="fab fa-instagram"></i>
          <i class="fab fa-twitter"></i>
       
      </div>
      </ul>
  
      <ul>
        <h1>Get to Know Us</h1>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Investor Relations</a></li>
    </ul>
    
    <ul>
      <h1>Get to Know Us</h1>
      <li><a href="#">Careers</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Investor Relations</a></li>
  </ul>
  
  <ul>
    <h1>Get to Know Us</h1>
    <li><a href="#">Careers</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Investor Relations</a></li>
  </ul>
  
  
  </div>
  
        <div class="last_footer">
            
          <p>Desgin By Ramiz</p>
          
        </div>
      </footer>
  <script src="{{ asset('resources/site/js/script.js') }}"></script>
  <script src="{{ asset('resources/site/js/ajax.js') }}"></script>
  </body>
  </html>




