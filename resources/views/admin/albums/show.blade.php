@extends('admin.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="well">
					{!! link_to_route('admin.albums.index', 'Back to album list', null, ['class' => 'btn btn-sm btn-primary']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<div class="well">
					<div class="row">
						<div class="col-md-2">

							@if($album->cover)
								<img class="img-thumbnail" src="{{ thumb_path($album, $album->cover) }}" alt="{{ $album->title }}">
							@endif

						</div>
						<div class="col-md-10">

							<h1>
								<span class="glyphicon glyphicon-{{ $album->active ? 'eye-open' : 'eye-close' }}" aria-hidden="true"></span>
								{{ $album->title }}
								<small>{{ $album->slug }}</small>
							</h1>
							<p>
								{!! bodyText($album->description) !!}
							</p>

						</div>
					</div>
				</div>

				<div class="well">
					<a class="btn btn-sm btn-primary" data-toggle="collapse" href=".collapseDescription" aria-expanded="false" aria-controls="collapseDescription">
						Toogle descriptions
					</a>
					<hr>
					@foreach($images->chunk(4) as $row)
						<div class="row">
							@foreach($row as $image)
								<div class="col-sm-3">

									<div class="thumbnail">
										<div class="caption">
											<span class="glyphicon glyphicon-{{ $image->active ? 'eye-open' : 'eye-close' }}" aria-hidden="true"></span>
											{!! link_to_route('admin.images.edit', 'Edit', ['image' => $image], ['class' => 'btn btn-xs btn-primary']) !!}
											{!! link_to_route('admin.images.destroy', 'Delete', ['image' => $image], ['class' => 'btn btn-xs btn-danger']) !!}
										</div>
										<img src="{{ thumb_path($album, $image) }}" alt="{{ $image->title }}">
										<div class="caption">
											<strong>{{ $image->title }}</strong>
											<div class="collapse collapseDescription">
												{!! bodyText($image->description) !!}
											</div>
										</div>
									</div>

								</div>
							@endforeach
						</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>

@endsection
