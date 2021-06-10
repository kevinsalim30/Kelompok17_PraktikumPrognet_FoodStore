<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login User</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('style/template/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/template/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/template/assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('style/template/assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('style/template/assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700&display=swap"
        rel="stylesheet">
    <!-- ICONS -->
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{asset('style/template/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('style/template/assets/img/favicon.png')}}"> --}}
</head>

<style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    .auth-box {
        border-radius: 20px;
    }

    .input-login {
        border-radius: 20px;
    }

    .btn-login {
        border-radius: 20px;
    }

    .content {
        padding-left: 10px;
    }

    .label-text {
        color: #000000;
    }

    .btn-color {
        background: #a4c639;
        border-color: #a4c639;
    }

    .btn-color:hover {
        background: #849e2d;
        border-color: #a4c639;
    }
</style>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left" style="margin-left: 80px">
                        <div class="content" style="width: 98%">
                            <div class="header">
                                <div class="logo text-center" style="font-weight: bold;font-size: 48px">Food Store</div>
                                <p class="lead">Login to your account</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="mx-auto text-center align-center">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-12 col-form-label label-text text-left">{{ __('Email') }}</label>

                                    <div class="col-md-10">
                                        <input id="email" type="email"
                                            class="form-control input-login @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="email@email.com" required
                                            autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-12 col-form-label label-text text-left">{{ __('Password') }}</label>

                                    <div class="col-md-10">
                                        <input id="password" type="password" placeholder="Min 8 character"
                                            class="form-control input-login @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" style="margin-left: -70px">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label label-text" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @if (Route::has('password.request'))
                                        <div class="bottom">
                                            <span class="helper-text"><i class="fa fa-lock"></i> <a
                                                    href="{{ route('password.request') }}">Lupa password?</a></span>
                                        </div>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-10 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-color btn-login btn-lg btn-block">
                                            {{ __('Login') }}
                                        </button>



                                    </div>
                                </div>

                                <div class="new-account text-left">
                                    <p>Belum terdaftar? <a href="{{ url('/register') }}">Buat Akun</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        {{-- <div class="content text">
							<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>
						</div> --}}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
