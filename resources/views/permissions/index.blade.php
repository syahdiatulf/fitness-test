{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app')
@section('title', '| Permissions')
@section('content')
<div class="col-md-10 col-md-offset-1">
@if(session('msg'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
			{{ session('msg') }}<br/>
	</div>
@endif
    <h3>Permissions Management</h3>
	<br>
	<a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.create') }}" class="btn btn-success">Add Permission</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name  }}</td> 
                    <td>
                    <a href="{{ URL::to('permission-edit/'.$permission->id.'') }}" class="btn btn-warning pull-left"><i class="fa fa-pencil-square-o" ></i></a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission] ]) !!}
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