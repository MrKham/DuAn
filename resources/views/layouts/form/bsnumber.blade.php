<div class="form-group">    
    {{ Form::label($title, null, ['class' => 'control-label']) }}    
    {{ Form::number($name, $value, ['class' => 'form-control', 'min' => $min, 'max' => $max]) }}
    @if (isset($errors) && $errors->has($name))
    	@foreach ($errors->get($name) as $error)
			<div class="invalid-feedback" style="display: block;">{{ $error }}</div>
		@endforeach
    @endif
</div>