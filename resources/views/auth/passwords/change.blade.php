<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ChangePassword - IDLe</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>IDLe</h1>
    </div>
    <div class="login-box">
      <form class="login-form" method="POST" action="{{ route('admin.post.chpwd') }}">
          @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-circle-o"></i>Reset Password</h3>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <input type="text" name="user" value="{{Auth::user()->email}}" hidden>
                <div class="col-md-6">
                    <input id="password" type="password" value="" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="text" name="user" value="{{Auth::user()->id}}" hidden>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{ asset('assets/admin/js/plugins/pace.min.js') }}"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function () {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>
