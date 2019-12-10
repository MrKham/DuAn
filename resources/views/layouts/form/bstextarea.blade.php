<div class="form-group @if (isset($errors) && $errors->has($name)) has-error @endif">
	<?php
    	$attrs = array('class' => 'form-control');
		if (isset($placeholder))
		{
			$attrs['placeholder'] = $placeholder;
		}
		if (isset($validation))
		{
			$attrs = array_merge($attrs, $validation);
		}
		if (isset($attribute))
		{
			$attrs = array_merge($attrs, $attribute);
		}
    ?>
    @if (isset($title))
		{{ Form::label($name, $title, array('class' => 'control-label')) }}
	@endif
	{{ Form::textarea($name, $value, $attrs) }}

    @if (isset($hin))
	    <div class="note">
	        {{ $hin }}
	    </div>
    @endif
    @if (isset($errors) && $errors->has($name))
    	@foreach ($errors->get($name) as $error)
			<div class="invalid-feedback" style="display: block;">{{ $error }}</div>
		@endforeach
    @endif
</div>
