<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{{ config('gallery.sitename') }} | @yield('title')</title>
	<meta name="application-name" content="{{ config('gallery.sitename') }}" />
	<meta name="author" content="{{ config('gallery.author') }}">

    <meta property="fb:app_id"    content="{{ config('gallery.facebook.appId') }}" />
    <meta property="og:site_name" content="{{ config('gallery.sitename') }}" />
	@yield('meta')

	<!-- Styles -->
	<link href="{{ elixir('assets/css/gallery.css') }}" rel="stylesheet">
	@yield('styles')
</head>
<body>
    <script>
        // Facebook
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '{{ config('gallery.facebook.appId') }}',
                xfbml      : true,
                version    : 'v2.5'
            });
        };
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Twitter
        !function(d,s,id){
            var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
            if(!d.getElementById(id)){
                js=d.createElement(s);js.id=id;
                js.src=p+'://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js,fjs);
            }
        }(document, 'script', 'twitter-wjs');
    </script>

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

        <hr>

		<div class="footer">
			<div class="page-footer text-center">
				<small class="text-muted"><a href="https://github.com/martindilling/gallery" target="_blank">Gallery</a> by Martin Dilling-Hansen</small>
			</div>
		</div>
	</div>


	<!-- Scripts -->
	<script src="{{ elixir('assets/js/gallery.js') }}"></script>
    @yield('scripts')

    <!-- Google Analytics -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','{{ Config::get('gallery.google.analytics') }}');ga('send','pageview');
    </script>
</body>
</html>
