<?php if(!Auth::user()->hasRole('admin')) abort(503, "Permission denied"); ?>
@extends('app')

@section('content')
<div class="row" style="padding: 15px 40px;">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-edit fa-fw "></i> 
                Phân quyền người dùng
        </h1>
    </div>
</div>
<section id="widget-grid" style="padding: 15px 40px;">
    <div class="row">
        <article class="col-lg-12">
                <div>
					<?php
						$roles = App\Models\Role::all();
						$users = App\Models\User::with("roles")->paginate(30);
					?>
					{!! Form::open(array("url" => "user_role", "method" => "post")) !!}
                    <div class="widget-body">
                        <div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
					                <tr>
					                	<th>Tên người dùng</th>
					                	<th>Email</th>
					                	@foreach ($roles as $role)
					                	<th><center>{{ $role->name }}</center></th>
					                	@endforeach
					                	{{-- <th>Thao tác</th> --}}
					                </tr>
				                </thead>
				                <tbody>
				                	@foreach ($users as $user)
					                <tr>
					                	<input type="hidden" name="user_check_{{ $user->id}}" value="1" />
					                	<td>{{ $user->name }}</td>
					                	<td>{{ $user->email }}</td>
					                	
					                	@foreach ($roles as $role)
					                	<td>
					                		<center>
					                			<input name="user_{{ $user->id }}[]" type="checkbox" value="{{ $role->id }}"
					                			<?php
					                			foreach ($user->roles as $user_role)
					                			{
					                				if ($user_role->id === $role->id)
													{
														echo "checked"; break;
													}
					                			}
					                			?>
					                			>
					                		</center>
					                	</td>
					                	@endforeach
					                	{{-- <td>
					                		<a class="btn btn-sm btn-warning" href="{{ url("/user/$user->id/permission") }}"><i class="fa fa-key"></i></a>
					                	</td> --}}
					                </tr>
					                @endforeach
				                </tbody>
			                </table>
			                {{ $users->links() }}
			            </div>
			            <div class="widget-footer" style="text-align: left;">
			                <button type="submit" class="btn btn-primary">
			                    Thực hiện
			                </button>
			            </div>
                    </div>
                </div>
        </article>
    </div>
</section>
@endsection