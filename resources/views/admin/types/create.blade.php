@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('admin.types.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bolder m-0 py-1" for="name">Name of project type:</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" placeholder="Name" name="name">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    <div class="col-12">
                        <div class="d-flex justify-content-end my-3"><button type="submit" class="btn btn-success fw-bolder">Save</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection