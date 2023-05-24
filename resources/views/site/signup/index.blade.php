@extends('site.layout.loginmaster')
@section('title', 'Sign Up')


@section('content')


<div class="login_cont rig">
    <h1>New account</h1>

    <form method="POST">

      <div class="full_name">
      
        <div>

      <label>First Name</label>
        <input  type="text" name="first_name" placeholder="First Name">
     
      </div>

      <div>
        <label>Last Name</label>
        <input  type="text" name="last_name" placeholder="Last Name">
      </div>

    </div>


        <label>Phone Number</label>
        <input  type="number" name="phone" placeholder="Phone Number">

        <label>Email</label>
        <input class="email" type="text" name="email" placeholder="Email">
        
        <label>PASSWORD</label>

            
        <input type="password" name="password" placeholder="password">

        
        <label>Confirm Password</label>

            
        <input type="password" name="password" placeholder="password">

        
      

        <button name="login">CREATE</button>

        <div class="login-soc-icons">
        <p>or signup using</p>

        <a href="#" class="faceb"><i class="fab fa-facebook-f"></i></a>
      
      
      <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
     <a href="#" class="google"> <i class="fab fa-google"></i></a>
    </div>

  
    </form>
    <a class="signub-link login-link" href="/login">Go To Login Page</a>
</div>












@endsection