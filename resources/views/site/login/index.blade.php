@extends('site.layout.loginmaster')
@section('title', 'Login')


@section('content')


<div class="login_cont">
    <h1>Login</h1>

    <form action="{{ route('user.auth.check') }}" method="POST">
      @csrf
        <label>EMAIL</label>
        <div class="input-cont">
            
        <input class="email" type="text" name="email" placeholder="email">
        <i class="input-icon fas fa-user-circle"></i>
        </div>
        @if(Session::get('failemail'))
        <span class="login-text-danger">{{Session::get('failemail')}}</span>
    
        @endif

        <label>PASSWORD</label>
        <div class="input-cont">
            
        <input type="password" name="pass" placeholder="password">
        <i class="input-icon fas fa-key"></i>
      </div>
      @error('pass')
      <span class="login-text-danger">{{$message}}</span>
      @enderror
      @if(Session::get('failpass'))
      <span class="login-text-danger">{{Session::get('failpass')}}</span>
  
      @endif

        <button name="login">LOGIN</button>

        <div class="login-soc-icons">
        <p>or signup using</p>

        <a href="#" class="faceb"><i class="fab fa-facebook-f"></i></a>
      
      
      <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
     <a href="#" class="google"> <i class="fab fa-google"></i></a>
    </div>

  
    </form>
    <a class="signub-link" href="/signup">SIGN UP</a>
</div>







@endsection