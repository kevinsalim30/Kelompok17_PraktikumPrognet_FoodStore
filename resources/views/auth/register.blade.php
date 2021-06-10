<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Register</title>
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
				<div class="auth-box " style="height: 650px">
					<div class="left" style="margin-left: 80px">
						<div class="content" style="width: 98%">
							<div class="header">
                                {{-- <br>
								<div class="logo text-center"><img src="{{asset('style/template/assets/img/store.png')}}"></div> --}}
								<p class="lead" style="font-weight: bold;font-size: 25px;color: black">Register</p>
							</div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-12 label-text col-form-label text-left">{{ __('Name') }}</label>

                                    <div class="col-md-10">
                                        <input id="name" type="text" class="form-control input-login @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-12 label-text col-form-label text-left">{{ __('Email Address') }}</label>

                                    <div class="col-md-10">
                                        <input id="email" type="email" class="form-control input-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 label-text col-form-label text-left">{{ __('Password') }}</label>

                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control input-login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-12 label-text col-form-label text-left">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-10">
                                        <input id="password-confirm" type="password" class="form-control input-login" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="profile_image" class="col-md-12 label-text col-form-label text-left">{{ __('Profil Image') }}</label>

                                    <div class="col-md-10">
                                        <input id="profile_image" type="file" class="form-control input-login @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image') }}" required autocomplete="profile_image" autofocus>

                                        @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-10 ">
                                        <button type="submit" class="btn btn-login btn-color btn-primary btn-lg btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 20px">
                                        <div class="new-account text-left ">
                                            <p>Sudah punya akun? <a href="{{ url('/login') }}">Login sekarang</a></p>
                                        </div>
                                    </div>
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
                    <br>
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __('Profil Image') }}</label>

                            <div class="col-md-6">
                                <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image') }}" required autocomplete="profile_image" autofocus>

                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
