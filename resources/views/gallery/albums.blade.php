@extends('master')

@section('content')

	<ol class="breadcrumb">
		<li class="active">Albums</li>
	</ol>

	<div class="page-header">
		<h1 class="text-center">Albums</h1>
	</div>

	@if ($albums->count())
		<div class="row">
			<?php $counter = 1 ?>
			@foreach ($albums as $album)
				<div class="grid album col-xs-4 col-sm-3 col-md-2 col-lg-2">
					<a href="{{ url($album->slug) }}">
						<span class="dim"></span>
						<img src="{{ thumb_path($album->id, $album->cover->file) }}" class="img-responsive" alt="{{ $album->title }}">
						<span class="title label label-default">{{ $album->title }}</span>
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
		There are no albums
	@endif

@stop
