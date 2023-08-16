@extends('layouts.app')

@section('content')
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TEST</title>
		<link rel="icon" href="{!! asset('storage/mini-logo.png') !!}"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="content">
                <div class="title m-b-md">
                    <span class="logo-lg"><img src="{{ asset('storage/logo.png') }}" class="img-responsive" ></span>
                </div>

                <div class="links">
                <a href="{{ route('users.index') }}"><i class="fa fa-btn fa-users" ></i>Users</a>
				<a href="{{ route('roles.index') }}"><i class="fa fa-btn fa-eye-slash" ></i>Roles</a>
				<a href="{{ route('permissions.index') }}"><i class="fa fa-btn fa-puzzle-piece" ></i>Permissions</a>
				<a href="{{ route('fitness.index') }}"><i class="fa fa-btn fa-clock-o" ></i>Class</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection