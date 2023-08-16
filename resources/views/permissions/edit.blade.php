@extends('layouts.app')
@section('title', '| Update Permission')
@section('content')
<div class='col-md-4 col-md-offset-4'>
    <h1><i class='fa fa-puzzle-piece'></i> Update {{$permission->name}}</h1>
    <br>
    <form action="{{ route('permissions.update', $permission->id) }}"  method="POST">
    @csrf
        <div class="form-group row">
			<label class="col-md-2 col-form-label font-weight-bold">Name: </label>
			<div class="col-md-10"><input class="form-control" type="text" name="name" value="{{ $permission->name }}" /></div>
		</div>
        <br>
    @if(!$roles->isEmpty()) 
        <h3>Assign Permission to Roles</h3>
        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
        @endforeach
    @endif
    <br>
    <button type="submit" style="float: right;" name="action" value="Submitted" class="btn btn-success mr-2">SUBMIT</button>

    </form>
</div>
@endsection