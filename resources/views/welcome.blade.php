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
        @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: 100vh;
	background-image: url('{{url("public/eid.jpg")}}');
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
    </style>

</head>

<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
            
			<div>
            <img src="{{ url('public/logo.png') }}" class="col-sm-12" alt="logo" style="width: 150px">
                
                اتاق اصناف ایران</div>

		</div>
		<br>
		<div class="login">
				<input type="text" placeholder="username"  name="user"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="button" value="Login">
		</div>


</html>
