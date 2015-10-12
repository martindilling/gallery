@extends('master')

@section('title', "Albums")

@section('content')

	<div class="header">
		@include('gallery.partials.breadcrumb', [
			'breadcrumb' => [
				['text' => 'Albums', 'url' => null],
			]
		])
		@include('gallery.partials.title', ['title' => 'Albums'])
		@include('gallery.partials.description', ['description' => null])
	</div>

	@if ($albums->count())
		<div class="row">
			@foreach ($albums as $album)
				<div class="grid-item">
					<a href="{{ album_url($album) }}">
						<span class="dim"></span>
						<img src="{{ thumb_path($album, $album->cover) }}" class="img-fluid" alt="{{ $album->title }}">
						<span class="title label label-default">{{ $album->title }}</span>
					</a>
				</div>
			@endforeach
		</div>
	@else
		<div class="row">
			<div class="nothing-found">There are no albums</div>
		</div>
	@endif

@stop
