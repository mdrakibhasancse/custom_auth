<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}alte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/')}}alte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}alte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

        @if (session('status'))
            <div class="text-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="text-danger">
                {{ session('error') }}
            </div>
        @endif

      <form action="{{ route('login')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> --}}
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('linkRequestForm')}}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('registerForm')}}" class="text-center">Register a new user</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/')}}alte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}alte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}alte/dist/js/adminlte.min.js"></script>
</body>
</html>
