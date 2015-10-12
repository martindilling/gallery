@extends('master')

@section('title', "{$album->title}")

@section('content')

	<div class="header">
		@include('gallery.partials.breadcrumb', [
			'breadcrumb' => [
				['text' => 'Albums', 'url' => url('/')],
				['text' => $album->title, 'url' => null],
			]
		])
		@include('gallery.partials.title', ['title' => $album->title])
		@include('gallery.partials.description', ['description' => $album->description])
	</div>

	@if ($images->count())
		<div class="row">
			@foreach ($images as $image)
				<div class="grid-item">
					<a href="{{ image_url($album, $image) }}" caption=" {{ $image->text }}" imgpage="{{ image_url($album, $image) }}">
						<span class="dim"></span>
						<img src="{{ thumb_path($album, $image) }}" class="img-fluid" alt="{{ $image->title }}">
					</a>
				</div>
			@endforeach
		</div>
	@else
		<div class="row">
			<div class="nothing-found">There are no images in this album</div>
		</div>
	@endif

@stop
