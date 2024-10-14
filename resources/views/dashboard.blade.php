@extends('layouts.app')

@section('content')
<div class="jumbotron d-flex justify-content-center pt-3">
    <div class="container">
        <h2 class="my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0">{{ __('User Dashboard') }}</h5>
                    </div>
    
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
    
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
