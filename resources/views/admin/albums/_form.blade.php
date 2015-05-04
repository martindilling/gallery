<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control input-lg']) !!}
</div>
<div class="form-group">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', null, ['class' => 'form-control input-sm']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['rows' => 4, 'class' => 'form-control input-sm']) !!}
</div>
<div class="form-group">
	<label>
		{!! Form::checkbox('active', 1) !!}
		Active
	</label>
</div>

<div class="well">
	{!! Form::submit((isset($submit) ? $submit : 'Undefined'), ['class' => 'btn btn-primary']) !!}
</div>
