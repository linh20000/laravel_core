<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
{{-- <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css"> --}}
{!! \Html::style('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
<!-- Font Awesome -->
{{-- <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css"> --}}
{!! \Html::style('adminlte/bower_components/font-awesome/css/font-awesome.min.css') !!}
<!-- Ionicons -->
{{-- <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css"> --}}
{!! \Html::style('adminlte/bower_components/Ionicons/css/ionicons.min.css') !!}
<!-- Theme style -->
{{-- <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css"> --}}
{!! \Html::style('adminlte/dist/css/AdminLTE.min.css') !!}
<!-- iCheck -->
{{-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> --}}
{!! \Html::style('adminlte/plugins/iCheck/square/blue.css') !!}

{!! \Html::style('plugin_admin/toastr/toastr.min.css') !!}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<div class="register-box">
    <div class="register-logo">
        <a href=""><b>{{ env('APP_NAME', 'REGISTER ACCOUNT') }}</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg"> Đăng ký thành viên mới</p>
        {{--  Register a new membership --}}
        <form action="{{ route('register.post') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Họ tên">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="text-danger" >
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="text-danger" >
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="Số điện thoại">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                @if ($errors->has('phone_number'))
                    <span class="text-danger" >
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Địa chỉ">
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                @if ($errors->has('address'))
                    <span class="text-danger" >
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="date" value="{{ old('birth_day') }}"  name="birth_day" class="form-control" >
                @if ($errors->has('birth_day'))
                    <span class="text-danger" >
                        <strong>{{ $errors->first('birth_day') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger" >
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
{{--                        <label>--}}
{{--                            <input type="checkbox"> I agree to the <a href="#">terms</a>--}}
{{--                        </label>--}}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
        </div>

        <a href="{{ route('login.get') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
{{-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> --}}
{!! \Html::script('adminlte/bower_components/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap 3.3.7 -->
{{-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> --}}
{!! \Html::script('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- iCheck -->
{{-- <script src="../../plugins/iCheck/icheck.min.js"></script> --}}
{!! \Html::script('adminlte/plugins/iCheck/icheck.min.js') !!}

{!! \Html::script('plugin_admin/toastr/toastr.min.js') !!}
@include('admin.partials.notification')

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
