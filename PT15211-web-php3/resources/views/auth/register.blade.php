
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE-REGISTER</a>
  </div>
  <!-- /.login-logo -->
  @if ($errors->has('name'))
  <div class="alert alert-danger">{{$errors->first('name')}} </div>
  @endif
  @if ($errors->has('email'))
  <div class="alert alert-danger">{{$errors->first('email')}} </div>
  @endif
  @if ($errors->has('password'))
  <div class="alert alert-danger">{{$errors->first('password')}} </div>
  @endif
  @if ($errors->has('confirm_password'))
  <div class="alert alert-danger">{{$errors->first('confirm_password')}} </div>
  @endif

  @if(Session::has('confirm.email'))
  <div class="alert alert-success">
      {{Session::get('confirm.email')}}
  </div>
  @endif
  @if(Session::has('confirm.fail'))
  <div class="alert alert-danger">
      {{Session::get('confirm.fail')}}
  </div>
  @endif
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register to start your session</p>

      <form action="{{route('post.register')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
    
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="{{route('login')}}" class="text-center">Bạn đã có tài khoản, đăng nhập ngay!</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src=".{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

</body>
</html>
