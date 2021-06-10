<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="{{asset('styleuser/mobile/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('styleuser/mobile/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('styleuser/mobile/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('styleuser/mobile/assets/css/owl.css')}}">
    <title>@yield('title') - Food Store</title>
</head>

<body>

    <!-- Header -->
    {{-- <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-envelope"></i>phonestore@company.com</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>123-456-7890</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div> --}}

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: #a4c639">Food Store</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @guest
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li
                            class="nav-item {{ Request::url() == url('/home') || Request::url() == url('/product') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('home') }}">Home
                                <!--<span class="sr-only">(current)</span>-->
                            </a>
                        </li>
                        <li
                            class="nav-item {{ Request::url() == url('/cart') || Request::url() == url('/checkout') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('cart') }}">Login</a>
                        </li>
                        <li
                            class="nav-item {{ Request::url() == url('/order') || Request::url() == url('/order/unverified') || Request::url() == url('/order/verified') || Request::url() == url('/order/delivered') || Request::url() == url('/order/success') || Request::url() == url('/order/expired') || Request::url() == url('/order/canceled') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('order') }}">Register</a>
                        </li>
                    </ul>
                </div>
                @else
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mr-auto">
                        <li
                            class="nav-item {{ Request::url() == url('/home') || Request::url() == url('/product') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('home') }}">Home
                                <!--<span class="sr-only">(current)</span>-->
                            </a>
                        </li>
                        <li
                            class="nav-item {{ Request::url() == url('/cart') || Request::url() == url('/checkout') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('cart') }}">Keranjang</a>
                        </li>
                        <li
                            class="nav-item {{ Request::url() == url('/order') || Request::url() == url('/order/unverified') || Request::url() == url('/order/verified') || Request::url() == url('/order/delivered') || Request::url() == url('/order/success') || Request::url() == url('/order/expired') || Request::url() == url('/order/canceled') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('order') }}">Status Order</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle icon-menu" data-toggle="dropdown"
                                style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                </svg>
                                @php $user_unRead = \App\UserNotifications::where('notifiable_id',
                                Auth::user()->id)->where('read_at', NULL)->orderBy('created_at','desc')->count();
                                @endphp
                                <span class="badge bg-danger">@php echo $user_unRead @endphp</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                @php $user_notifikasi = \App\UserNotifications::where('notifiable_id',
                                Auth::user()->id)->where('read_at', NULL)->orderBy('created_at','desc')->get(); @endphp
                                @forelse ($user_notifikasi as $notifikasi)
                                @php $notif = json_decode($notifikasi->data); @endphp
                                <li>
                                    <a href="{{ route('user.notification', $notifikasi->id) }}"
                                        class="dropdown-item btnunNotif" data-num=""><small>[{{ $notif->nama }}]
                                            {{ $notif->message }}</small></a>
                                </li>
                                @empty
                                <li>
                                    <a href="#" class="dropdown-item btnunNotif" data-num="">
                                        &nbsp;<small>Tidak ada notifikasi</small>
                                    </a>
                                </li>
                                @endforelse

                                {{--@foreach(Auth::guard('user')->user()->readNotifications as $notif)
                      <li>
                        <a href="#" class="dropdown-item btnNotif" data-num="{{$loop->iteration}}" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-people" viewBox="0 0 16 16">
                                    <path
                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                </svg>
                                &nbsp;System space is almost full
                                <input type="hidden" id="untype_{{$loop->iteration}}" value="{{$notif->type}}">
                                <input type="hidden" id="unread_at_{{$loop->iteration}}" value="{{$notif->read_at}}">
                                <input type="hidden" id="id_unntf_{{$loop->iteration}}" value="{{$notif->id}}">
                                </a>
                        </li>
                        @endforeach--}}
                    </ul>
                    </li>
                    </ul>
                </div>
                @endguest


            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <main>
        @yield('page-contents')
    </main>

    <br>



    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Copyright © 2021 Food Store
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('styleuser/mobile/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('styleuser/mobile/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('styleuser/mobile/assets/js/custom.js')}}"></script>
    <script src="{{asset('styleuser/mobile/assets/js/owl.js')}}"></script>
    <script src="{{asset('styleuser/mobile/assets/js/slick.js')}}"></script>
    <script src="{{asset('styleuser/mobile/assets/js/accordions.js')}}"></script>

    <script type="text/javascript">
        $('.btnNotif').click(function () {
            var number = $(this).data("num");
            $.ajax({
                url: "{{url('/getNotif')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    id_ntf: $('#id_ntf_' + number).val(),
                    type: $('#type_' + number).val(),
                    read_at: $('#read_at_' + number).val(),
                },
                success: function (data) {
                    //1 = respon, 2 = status
                    if (data == 1) {
                        alert("silahkan cek review anda");
                        location.reload();
                    }
                    elseif(data == 2) {
                        window.location.href = "/pesananuser";
                    }
                    // window.location.href = "/";
                }
            });
        });

        $('.btnunNotif').click(function () {
            var number = $(this).data("num");
            $.ajax({
                url: "{{url('/getNotif')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    id_ntf: $('#id_unntf_' + number).val(),
                    type: $('#untype_' + number).val(),
                    read_at: $('#unread_at_' + number).val(),
                },
                success: function (data) {
                    if (data == 1) {
                        alert("silahkan cek review anda");
                        location.reload();
                    } else if (data == 2) {
                        window.location.href = "/pesananuser";
                    }
                }
            });
        });

    </script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }

    </script>

</body>

</html>
