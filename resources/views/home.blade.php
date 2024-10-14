@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">
            Welcome to your dashboard
        </h1>

        <p class="col-md-8 fs-4">
            Here you can manage your portfolio.
        </p>
        <p class="col-md-8 home-p my-5">Please <a href="{{ route('login') }}">log in</a> or <a href="{{ route('register') }}">register</a> if you are new!</p>
    </div>
</div>
@endsection