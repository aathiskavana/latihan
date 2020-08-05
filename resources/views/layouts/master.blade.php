<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laravel Shopping</title>
	<link rel="stylesheet" href="{{ URL::to('Font-Awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">	
	<link rel="stylesheet" href="{{ url::to('css/style.css') }}">
</head>
<body>
	@include('layouts.header')
	@yield('content')

	<script src="{{ URL::to('js/jquery.js') }}"></script>
	<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
	@yield('script')
</body>
</html>