@extends('admin.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				{!! Form::open(['route' => 'admin.albums.store']) !!}
					@include('admin.albums._form', ['submit' => 'Create'])
				{!! Form::close() !!}

			</div>
		</div>
	</div>

@endsection
