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
<div class="login-box">
    <div class="login-logo">
        <a href="">{{ env('APP_NAME')  }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Reset Password</p>
        <div class="alert-error-login">
            @if ($errors->has('email'))
                <div class="callout callout-danger">
                    <p>{{ $errors->first('email') }}</p>
                </div>
            @endif

            @if ($errors->has('throttle'))
                <div class="callout callout-danger">
                    <p>{{ $errors->first('throttle') }}</p>
                </div>
            @endif

            @if (session('status'))
                <div class="callout callout-success">
                   <!-- notification that the email has been sent -->
                    <p>Đã gửi thông báo tới đỉa chỉ email!. Vui lòng kiểm tra email!</p>
                </div>
            @endif
        </div>

        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-group has-feedback ">
                <input type="email" name="email" class="form-control" value="{{ old(value('email')) }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
            <!-- Send Password Reset Link -->
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
    $(document).ready(function() {
        @if ($errors->has('email'))
            toastr['error']('{{ $errors->first('email') }}');
        @endif
    });

</script>
</body>
</html>
