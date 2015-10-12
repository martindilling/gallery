@extends('master')

@section('title', "{$album->title} | {$image->title}")

@section('meta')
    <meta property="og:url"          content="{{ image_url($album, $image) }}" />
    <meta property="og:type"         content="article" />
    <meta property="og:title"        content="{{ $album->title }}" />
    <meta property="og:description"  content="{{ $image->description or 'No description' }}" />
    <meta property="og:image"        content="{{ facebook_path($album, $image) }}" />
    <meta property="og:image:width"  content="1200" />
    <meta property="og:image:height" content="630" />
@stop

@section('content')
	<div class="header">
		@include('gallery.partials.breadcrumb', [
			'breadcrumb' => [
				['text' => 'Albums', 'url' => url('/')],
				['text' => $album->title, 'url' => album_url($album)],
				['text' => $image->title, 'url' => null],
			]
		])
	</div>

	@if ($image)
		<div class="image-navigation-row">
			<div data-image-navigation class="image-navigation text-center">
				<a data-previous-image class="arrow-link" href="{{ image_url($album, $previous) }}">
                    <span class="icon-circle-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<span class="counter">
					{{ $current }} / {{ $count }}
				</span>
				<a data-next-image class="arrow-link" href="{{ image_url($album, $next) }}">
                    <span class="icon-circle-right"></span>
					<span class="sr-only">Previous</span>
				</a>
			</div>
		</div>

		<div class="big-image-row">
            <div data-big-image-container class="big-image-container loading">
                <img data-big-image class="big-image img-fluid" data-src="{{ image_path($album, $image) }}" src="" alt="{{ $image->title }}">
            </div>
		</div>

        <div class="image-description-row">
            @include('gallery.partials.description', ['description' => $image->description])
        </div>

        <hr class="m-b-0">

		<div class="social-container">
            <div class="social-row">
                <div class="social">
                    <div class="fb-like"
                         data-href="{{ image_url($album, $image) }}"
                         data-layout="button"
                         data-action="like"
                         data-show-faces="false"
                         data-share="false"></div>

                    <div class="fb-share-button"
                         data-href="{{ image_url($album, $image) }}"
                         data-layout="button"></div>

                    <div class="fb-send"
                         data-href="{{ image_url($album, $image) }}"></div>

                    <a href="{{ image_url($album, $image) }}"
                       class="twitter-share-button"
                       data-count="none">Tweet</a>
                </div>
            </div>
        </div>

        <hr class="m-t-0">

        <div class="comments-container">
            <div class="comments-row">
                <div class="comments">
                    <div id="disqus_thread"></div>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                </div>
            </div>
		</div>

    @else
        No image
	@endif
@stop

@section('scripts')
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = '{{ config('gallery.disqus.shortname') }}';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
@stop
