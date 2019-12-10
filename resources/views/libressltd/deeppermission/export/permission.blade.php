<?php if(!Auth::user()->hasRole('admin')) abort(503, "Permission denied"); ?>
<html>
	<tr>
		<td>name</td>
		<td>code</td>
	</tr>
	@foreach (App\Models\Permission::with("group")->get() as $permission)
	<tr>
    <td>{{ $permission->name }}</td>
    <td>{{ $permission->code }}</td>
    </tr>
    @endforeach
</html>