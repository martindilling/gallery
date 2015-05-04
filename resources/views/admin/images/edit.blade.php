@extends('admin.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="well">
					{!! link_to_route('admin.albums.show', 'Back to album', ['album' => $album], ['class' => 'btn btn-sm btn-primary']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<div class="well">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<img class="img-thumbnail img-responsive" src="{{ image_path($image->album_id, $image->file) }}" alt="{{ $image->title }}">
						</div>
					</div>
					<hr>
					{!! Form::model($image, ['route' => ['admin.images.update', $image]]) !!}
						@include('admin.images._form', ['submit' => 'Save'])
					{!! Form::close() !!}
				</div>

			</div>
		</div>
	</div>

@endsection
