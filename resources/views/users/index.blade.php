@extends('layouts.app')
@section('title', '| Users')
@section('content')
<div class="col-lg-10 col-lg-offset-1">
@if(session('msg'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
			{{ session('msg') }}<br/>
	</div>
@endif
    <h3>User Management</h3>
	<br>
	<a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
    <br><br>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                    <a href="{{ URL::to('user-edit/'.$user->id.'') }}" class="btn btn-warning pull-left"><i class="fa fa-pencil-square-o" ></i></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection