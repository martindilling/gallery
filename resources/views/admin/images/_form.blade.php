<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	<label>
		{!! Form::checkbox('is_cover', 1, $isCover) !!}
		Cover
	</label>
</div>
<div class="form-group">
	<label>
		{!! Form::checkbox('active', 1) !!}
		Active
	</label>
</div>
<hr>
<div class="form-group">
	<p class="form-control-static">
		{!! link_to(original_path($image->album_id, $image->file), original_path($image->album_id, $image->file)) !!}
	</p>
	<p class="form-control-static">
		{!! link_to(image_path($image->album_id, $image->file), image_path($image->album_id, $image->file)) !!}
	</p>
</div>
<div class="well">
	{!! Form::submit((isset($submit) ? $submit : 'Undefined'), ['class' => 'btn btn-primary']) !!}
	{!! Form::input('submit', 'submit-previous', 'Update and previous', ['class' => 'btn btn-primary']) !!}
	{!! Form::input('submit', 'submit-next', 'Update and next', ['class' => 'btn btn-primary']) !!}
</div>
