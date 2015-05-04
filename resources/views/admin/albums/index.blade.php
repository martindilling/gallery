@extends('admin.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="well">
					{!! link_to_route('admin.albums.create', 'New album', null, ['class' => 'btn btn-sm btn-primary']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				@foreach($albums as $album)
					<div class="well">
						<div class="row">
							<div class="col-md-2">

								@if($album->cover)
									<img class="img-thumbnail" src="{{ thumb_path($album->id, $album->cover->file) }}" alt="{{ $album->title }}">
								@endif

							</div>
							<div class="col-md-10">

								{!! link_to_route('admin.albums.show', 'Show', ['album' => $album], ['class' => 'btn btn-xs btn-info']) !!}
								{!! link_to_route('admin.albums.edit', 'Edit', ['album' => $album], ['class' => 'btn btn-xs btn-primary']) !!}

								{!! Form::open(['route' => ['admin.albums.destroy', $album], 'method' => 'delete', 'class' => 'form-inline', 'style' => 'display: inline-block;']) !!}
									{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
								{!! Form::close() !!}
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
				@endforeach

			</div>
		</div>
	</div>

@endsection
