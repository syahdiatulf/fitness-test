@extends('layouts.app')
@section('title', '| Create Role')
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
    <h3><i class='fa fa-eye-slash'></i> Create Role</h3>
    <br>
    <form action="{{ route('roles.store') }}"  method="POST">
    @csrf
        <div class="form-group row">
			<label class="col-md-2 col-form-label font-weight-bold">Name: </label>
			<div class="col-md-10"><input class="form-control" type="text" name="name" placeholder="Eg. Admin" /></div>
		</div>
        <br>
    @if(!$permissions->isEmpty()) 
        <h3>Assign Role to Permissions</h3>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
        @endforeach
    @endif
    <br>
    <button type="submit" style="float: right;" name="action" value="Submitted" class="btn btn-success mr-2">SUBMIT</button>

    </form>
</div>
@endsection