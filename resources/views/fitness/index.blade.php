@extends('layouts.app')
@section('title', '| Class')
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
    <h3>Class Management</h3>
    <br><a href="{{ url('/fitness-classes/create') }}" class="btn btn-primary">Create New Class</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->description }}</td>
                    <td>
                    <a href="{{ url('/fitness-classes/{$class->id}/edit') }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection