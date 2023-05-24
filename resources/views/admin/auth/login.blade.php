<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="{{ asset('resources/admin/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('resources/admin/css/style.css') }}">
      
      </head>

<body class="login_body">




  <div id="login_cont"class="login_cont">
    <script src="{{ asset('resources/admin/js/script.js') }}"></script>
      <h1>Login</h1>
    
      @if(Session::get('fail'))
      <script>
               showmessageLogin("{{Session::get('fail')}}");
   </script>
  
  
   @endif
      <form action="{{ route('admin.login.check') }}" method="POST">
        @csrf
          <label>EMAIL</label>
          <div>
            <img class="login_icon" src="{{ asset('resources/admin/images/login.png') }}">
          <input id="email" class="email" type="text" name="email" placeholder="email" autocomplete="username">
             
          </div>
          @error('email')
    <span class="login-text-danger">{{$message}}</span>
    @enderror
    @if(Session::get('failemail'))
    <span class="login-text-danger">{{Session::get('failemail')}}</span>

    @endif
          
          <label>PASSWORD</label>
          <div>
            <img src="{{ asset('resources/admin/images/pass.png') }}">
          <input type="password" name="pass" placeholder="password" autocomplete="current-password">
         
        </div>
        @error('pass')
        <span class="login-text-danger">{{$message}}</span>
        @enderror
        @if(Session::get('failpass'))
        <span class="login-text-danger">{{Session::get('failpass')}}</span>
    
        @endif

        <div class="rem">
          <label for="remember">Remember me</label>
          <input  id="rememberMe" type="checkbox" name="remember" value="lsRememberMe" >
    </div>
          <button name="login" onclick="lsRememberMe();">LOGIN</button>
      </form>
      
  </div>
  



  <script src="{{ asset('resources/admin/js/login.js') }}"></script>
    </body>


    </html>
