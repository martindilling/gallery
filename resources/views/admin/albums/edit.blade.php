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
					{!! Form::model($album, ['route' => ['admin.albums.update', $album]]) !!}
						@include('admin.albums._form', ['submit' => 'Save'])
					{!! Form::close() !!}

					{!! Form::open([
						'route'     => ['admin.albums.upload', $album->id],
						'method'    => 'POST',
						'files'     => 'true',
						'data-ajax' => 'true',
						'id'        => 'dropzone-uploader',
						'class'     => 'dropzone'
					]) !!}
					{!! Form::close() !!}
				</div>

				<div class="well">
					@foreach($images->chunk(6) as $row)
						<div class="row">
							@foreach($row as $image)
								<div class="col-sm-2">

									<a href="{{ route('admin.images.edit', ['image' => $image]) }}">
										<img class="img-thumbnail" src="{{ thumb_path($album, $image) }}" alt="{{ $image->title }}">
									</a>

								</div>
							@endforeach
						</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>

@endsection
