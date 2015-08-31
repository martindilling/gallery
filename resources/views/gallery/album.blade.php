@extends('master')

@section('content')

	<ol class="breadcrumb">
		<li><a href="{{ url('/') }}">Albums</a></li>
		<li class="active">{{ $album->title }}</li>
	</ol>

	<div class="page-header">
		<h1 class="text-center">{{ $album->title }}</h1>
	</div>

	@if ($album->description)
		<div class="row">
			<div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="img-description">{!! bodyText($album->description) !!}</div>
			</div>
		</div>
	@endif

	@if ($images->count())
		<div class="row">
			<?php $counter = 1 ?>
			@foreach ($images as $image)
				<div class="grid image col-xs-4 col-sm-3 col-md-2 col-lg-2">
					<a href="{{ url($image->album->slug.DIRECTORY_SEPARATOR.$image->slug) }}" caption=" {{ $image->text }}" imgpage="{{ url($image->album->slug.'/'.$image->image) }}">
						<span class="dim"></span>
						<img src="{{ thumb_path($image->album_id, $image->file) }}" class="img-responsive" alt="{{ $image->title }}">
					</a>
				</div>
				<?php
					$clearfixes = '';
					if ($counter % 3 == 0) { $clearfixes .= ' visible-xs'; }
					if ($counter % 4 == 0) { $clearfixes .= ' visible-sm'; }
					if ($counter % 6 == 0) { $clearfixes .= ' visible-md visible-lg'; }

					$counter++;
				?>
				@if ( $clearfixes != '' )
					<div class="clearfix {{ $clearfixes }}"></div>
				@endif
			@endforeach
		</div>
	@else
		There are no images in this album
	@endif

@stop
