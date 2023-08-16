@extends('layouts.app')
@section('title', '| Roles')
@section('content')
<div class="col-lg-10 col-lg-offset-1">
@if(session('msg'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
			{{ session('msg') }}<br/>
	</div>
@endif
    <h3>Roles Management</h3>
    <br>
	<a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
	<a href="{{ route('roles.create') }}" class="btn btn-success">Add Role</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                    <td>
                    <a href="{{ URL::to('role-edit/'.$role->id.'') }}" class="btn btn-warning pull-left"><i class="fa fa-pencil-square-o" ></i></a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role] ]) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection