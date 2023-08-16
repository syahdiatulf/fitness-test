@extends('layouts.app')
@section('title', '| Create Class')
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
    <h3><i class='fa fa-eye-slash'></i> Create Class</h3>
    <br>
    <form action="{{ route('fitness.store') }}"  method="POST">
    @csrf
        <div class="form-group row">
			<label class="col-md-4 col-form-label font-weight-bold">Name: </label>
			<div class="col-md-8"><input class="form-control" type="text" name="name" /></div>
		</div>
        <div class="form-group row">
			<label class="col-md-4 col-form-label font-weight-bold">Description: </label>
			<div class="col-md-8"><input class="form-control" type="text" name="description" /></div>
		</div>
    <br>
    <button type="submit" style="float: right;" name="action" value="Submitted" class="btn btn-success mr-2">SUBMIT</button>

    </form>
</div>
@endsection