@extends('layouts.app')
@section('title', '| Update User')
@section('content')
<div class='col-md-4 col-md-offset-4'>
    <h1><i class='fa fa-puzzle-piece'></i> Update {{$user->name}}</h1>
    <br>
    <form action="{{ route('users.update', $user->id) }}"  method="POST">
    @csrf
        <div class="form-group row">
			<label class="col-md-2 col-form-label font-weight-bold">Name: </label>
			<div class="col-md-10"><input class="form-control" type="text" name="name" value="{{ $user->name }}" readonly/></div>
		</div>
        <div class="form-group row">
			<label class="col-md-2 col-form-label font-weight-bold">Email: </label>
			<div class="col-md-10"><input class="form-control" type="text" name="email" value="{{ $user->email }}" readonly/></div>
		</div>
        <br>
    @if(!$roles->isEmpty()) 
        <h3>Assign User to Role</h3>
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