<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ url('public/dashboard/plugins/font-awesome/css/font-awesome.min.css') . '?' . config('app.version') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/dashboard/dist/css/adminlte.min.css') . '?' . config('app.version') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet"
        href="{{ url('public/dashboard/dist/css/bootstrap-rtl.min.css') . '?' . config('app.version') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ url('public/dashboard/dist/css/custom-style.css') . '?' . config('app.version') }}">
    <link rel="stylesheet" href="{{ url('public/dashboard/dist/css/custom.css') . '?' . config('app.version') }}">

    {{-- <link rel="stylesheet" href="{{ url('public/dashboard/dist/css/custom.css')  . '?' . config('app.version') }}"> --}}
    <link rel="stylesheet" type="text/css"
        href="{{ url('public/dashboard/plugins/datatables/dataTables.bootstrap4.css') . '?' . config('app.version') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('style')

    <script src="{{ url('public/dashboard/plugins/jquery/jquery.min.js') . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/dashboard/plugins/datatables/jquery.dataTables.js') . '?' . config('app.version') }}">
    </script>
    <script src="{{ url('public/dashboard/plugins/datatables/dataTables.bootstrap4.js') . '?' . config('app.version') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ url('public/js/ajax.js') . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/js/dataTable.js') . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/js/dropzone.js') . '?' . config('app.version') }}"></script>
    <script>
        clear_cache()

        function clear_cache() {
            var ver = "{{ config('app.version') }}";
            console.log('APP VERSION: ' + ver);
            $('script').each(function(item) {
                $(this).attr('src', $(this).attr('src') + '?' + ver)
            })
            $('img').each(function(item) {
                $(this).attr('src', $(this).attr('src') + '?' + ver)
            })
            $('link').each(function(item) {
                $(this).attr('href', $(this).attr('href') + '?' + ver)
            })
        }
    </script>
    <style>
        html {
            background: url("{{url('public/eid.jpg')}}") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            overflow: hidden;
			
        }

        img {
            display: block;
            margin: auto;
            width: 100%;
            height: auto;
			
        }

        #login-button {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 30px;
            margin: auto;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(3, 3, 3, .8);
            overflow: hidden;
            opacity: 0.4;
            box-shadow: 10px 10px 30px #000;
        }

        /* Login container */
        #container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
			padding: 10px;
            width: 340px;
            height: 500px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 1px 1px 50px #000;
            display: none;
			-webkit-filter: none !important;
        }

        .close-btn {
            position: absolute;
            cursor: pointer;
            font-family: 'Open Sans Condensed', sans-serif;
            line-height: 18px;
            top: 3px;
            right: 3px;
            width: 20px;
            height: 20px;
            text-align: center;
            border-radius: 10px;
            opacity: .2;
            -webkit-transition: all 2s ease-in-out;
            -moz-transition: all 2s ease-in-out;
            -o-transition: all 2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        .close-btn:hover {
            opacity: .5;
        }

        /* Heading */
        h1 {
            font-family: 'Open Sans Condensed', sans-serif;
            position: relative;
            margin-top: 0px;
            text-align: center;
            font-size: 40px;
            color: #ddd;
            text-shadow: 3px 3px 10px #000;
        }

        /* Inputs */
        a,
        input {
            font-family: 'Open Sans Condensed', sans-serif;
            text-decoration: none;
            position: relative;
            width: 80%;
            display: block;
            margin: 9px auto;
            font-size: 17px;
            color: #fff;
            padding: 8px;
            border-radius: 6px;
            border: none;
            background: rgba(3, 3, 3, .1);
            -webkit-transition: all 2s ease-in-out;
            -moz-transition: all 2s ease-in-out;
            -o-transition: all 2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        input:focus {
            outline: none;
            box-shadow: 3px 3px 10px #333;
            background: rgba(3, 3, 3, .18);
        }

        /* Placeholders */
        ::-webkit-input-placeholder {
            color: #ddd;
        }

        :-moz-placeholder {
            /* Firefox 18- */
            color: red;
        }

        ::-moz-placeholder {
            /* Firefox 19+ */
            color: red;
        }

        :-ms-input-placeholder {
            color: #333;
        }

        /* Link */
        a {
			font-family: Vazir;
            text-align: center;
            padding: 4px 8px;
            background: rgba(107, 255, 3, 1);
        }

        a:hover {
            opacity: 0.7;
        }

        #remember-container {
            position: relative;
            margin: -5px 20px;
			color: black;
        }

        .checkbox {
            position: relative;
            cursor: pointer;
            -webkit-appearance: none;
            padding: 5px;
            border-radius: 4px;
            background: rgba(3, 3, 3, .2);
            display: inline-block;
            width: 16px;
            height: 15px;
        }

        .checkbox:checked:active {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .checkbox:checked {
            background: rgba(3, 3, 3, .4);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05), inset 15px 10px -12px rgba(255, 255, 255, 0.5);
            color: #fff;
        }

        .checkbox:checked:after {
            content: '\2714';
            font-size: 10px;
            position: absolute;
            top: 0px;
            left: 4px;
            color: #fff;
        }

        #remember {
            position: absolute;
            font-size: 13px;
            font-family: 'Hind', sans-serif;
            color: rgba(255, 255, 255, .5);
            top: 7px;
            left: 20px;
        }

        #forgotten {
            position: absolute;
            font-size: 12px;
            font-family: 'Hind', sans-serif;
            color: rgba(0, 0, 0, 1);
            right: 0px;
            top: 8px;
			margin-right: 15px;
            cursor: pointer;
            -webkit-transition: all 2s ease-in-out;
            -moz-transition: all 2s ease-in-out;
            -o-transition: all 2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        #forgotten:hover {
            color: rgba(255, 255, 255, .6);
        }

        #forgotten-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            width: 260px;
            height: 180px;
            border-radius: 10px;
            background: rgba(3, 3, 3, 0.25);
            box-shadow: 1px 1px 50px #000;
            display: none;
        }

        .orange-btn {
            background: rgba(87, 198, 255, .5);
        }
    </style>

</head>

<body>
    <div id="container">
		<img src="{{url('public/logo.png')}}" style="width:150px"></img>
		<p style="text-align: justify">
			مردم شهر و شهرستان شما امسال با خرید کالای با کیفیت و قیمت های عالی در فضای بسیار زیبا نمایشگاه بهاره،
			قدردان تلاش‌های صادقانه آن اتاق خواهند بود.
			امسال با شعار <span style="font-weight: 700">(عید تا عید)</span> به استقبال سالی عالی و باشکوه میرویم
		</p>

        <form action="javascript:void(0)" method="post" id="login-form">
			@csrf
            <input type="text" name="email" placeholder="{{__('username')}}" autocomplete="off">
            <input type="password" name="password" placeholder="{{__('password')}}">
            <a onclick="submit()" >{{__('Log in')}}</a>
            <div id="remember-container">
                <span id="forgotten">{{__('Forgotten password')}}</span>
            </div>
        </form>
    </div>

    <!-- Forgotten Password Container -->
    <div id="forgotten-container">
        <h1>Forgotten</h1>
        <span class="close-btn">
            <img src="{{url('public/logo.png')}}"></img>
        </span>

        <form>
            <input type="email" name="email" placeholder="E-mail">
            <a href="#" class="orange-btn">Get new password</a>
        </form>
    </div>
	<script src="{{ url('public/js/loader.js') . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/js/clearcach.js') . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/js/scripts.js') . '?' . config('app.version') }}"></script>

    <script>
        $("#container").fadeIn();
    </script>
	<script>
        function submit() {
            send_ajax_request(
                "{{ route('login') }}",
                $('#login-form').serialize(),
                function(response) {
                    show_message("به صفحه داشبورد منتقل میشوید")
                    window.location = "{{ url('dashboard') }}"
                },
                function(response) {
                    // console.log(response);
                    show_error(response)
                    hide_loading();
                }
            )
        }
    </script>
</body>


</html>
