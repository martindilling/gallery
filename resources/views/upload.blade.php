@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				{!! Form::open([
					'route'     => 'upload.post',
					'method'    => 'POST',
					'files'     => 'true',
					'data-ajax' => 'true',
					'class'     => 'dropzone'
				]) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
