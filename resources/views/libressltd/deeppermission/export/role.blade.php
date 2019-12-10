<?php if(!Auth::user()->hasRole('admin')) abort(503, "Permission denied"); ?>
<html>
	<tr>
    <td>name</td>
    <td>code</td>
    </tr>
	@foreach (App\Models\Role::all() as $role)
	<tr>
    <td>{{ $role->name }}</td>
    <td>{{ $role->code }}</td>
    </tr>
    @endforeach
</html>