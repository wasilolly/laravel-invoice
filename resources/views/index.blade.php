<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	 <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Laravel</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script>@yield('script')</script>
</head>
<body>
		
	<div class="nav">
		<a href="/">Home</a> |
		<a href="{{route('customer.index') }}">Customer</a> |
		<a href="{{route('order.index') }}">Order</a> |
		<a href="/invoice">Invoice</a> |
		<a href="{{route('statement')}}">Statement</a>
	</div>
	
		
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				@yield('content')
			</div>
		</div>
	</div>
	
</body>
</html>
