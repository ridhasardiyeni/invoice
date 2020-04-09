<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INVOICEAPP | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
@csrf
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>INVOICE</b> APP</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="#" method="post">
    @csrf
      <div class="form-group has-feedback">
        <input type="text" id="name" class="form-control{{$errors->has('name')?'is-invalid':''}}" name="name" value="{{old('name')}}" placeholder="Username" required="">
            @if($errors->has('name'))
                 <span class="glyphicon glyphicon-user form-control-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                 </span>
            @endif
       
      </div>
      <div class="form-group has-feedback">
        <input type="email" id="email" name="email" class="form-control{{$errors->has('email')?'is-invalid':''}}" value="{{old('email')}}" placeholder="Email" required="">
        @if($errors->has('email'))
         <span class="glyphicon glyphicon-envelope form-control-feedback">
            <strong>{{$errors->first('email')}}</strong>
        </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="number" id="phone" name="phone" class="form-control{{$errors->has('phone')?'is-invalid':''}}" value="{{old('phone')}}" placeholder="Phone Number" required="">
        @if($errors->has('phone'))
        <span class="glyphicon glyphicon-earphone form-control-feedback">
            <strong>{{$errors->first('phone')}}</strong>
        </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control{{$errors->has('password')?'is-invalid':''}}" value="{{old('password')}}" placeholder="Password" required="">
        @if($errors->has('password'))
        <span class="glyphicon glyphicon-lock form-control-feedback">
            <strong>{{$errors->first('password')}}</strong>
        </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Retype password" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        {{-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div> --}}
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('Register')}}</button>
        </div>
        
        <!-- /.col -->
      </div>
    </form>

   
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{url('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
