@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('admin.types.update', ['type' => $type->id])}}" enctype="multipart/form-data" class="py-5">
                    @csrf
                    @method('PUT')
                    <div class="row gy-3">
                        <div class="col-6">
                            <label class="form-label fw-bolder m-0 py-1" for="name">Update type name:</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name', $type->name)}}" placeholder="Type name" name="name">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                        <div class="col-12">
                            <div class="my-3"><button type="submit" class="btn btn-success fw-bolder">Save</button></div>
                        </div>
                        
                    
                </form>
            </div>
        </div>
    </div>
@endsection