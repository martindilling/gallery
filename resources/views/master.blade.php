<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Gallery</title>
	<meta name="application-name" content="Gallery" />
	<meta name="author" content="Martin Dilling-Hansen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	@yield('meta')

	<!-- Styles -->
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	@yield('styles')
</head>
<body>

	<div class="container">
		@if (Session::has('message'))
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Heads up!</strong> {{ Session::get('message') }}
			</div>
		@endif
		@if (Session::has('error'))
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error!</strong> {{ Session::get('error') }}
			</div>
		@endif
		@if (Session::has('success'))
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Success!</strong> {{ Session::get('success') }}
			</div>
		@endif

		@yield('content')

		<div class="page-footer text-center">
			<small class="text-muted"><a href="https://github.com/martindilling/gallery" target="_blank">Gallery</a> by Martin Dilling-Hansen</small>
		</div>
	</div>


	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('/js/main.js') }}"></script>
	@yield('scripts')
</body>
</html>
