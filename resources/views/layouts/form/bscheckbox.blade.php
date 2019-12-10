<div class="checkbox">
	<label>
		<?php
	    	$attrs = [];
			if (isset($attribute))
			{
				$attrs = array_merge($attrs, $attribute);
			}
	    ?>
		<input type='hidden' value='0' name='{{ $name }}'>
		{{ Form::checkbox($name, 1, ($value == 1 ? true : false), $attrs) }}
		{{ $title }}
	</label>
	@if (isset($errors) && $errors->has($name))
    	@foreach ($errors->get($name) as $error)
			<div class="invalid-feedback" style="display: block;">{{ $error }}</div>
		@endforeach
    @endif
</div>
