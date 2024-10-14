@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('admin.projects.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bolder m-0 py-1" for="name">Name of your project:</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" placeholder="Name" name="name">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bolder m-0 py-1" for="date_of_upload">Date of upload:</label>
                            <input class="form-control @error('date_of_upload') is-invalid @enderror" type="date" value="{{old('date_of_upload')}}" name="date_of_upload">
                            @error('date_of_upload')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row gy-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bolder m-0 py-1" for="type">Field</label>
                            <select class="form-control" name="type_id" required>
                                <option value="">-- Seleziona un tipo --</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" @selected($type->id == old('type_id'))>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bolder m-0 py-1" for="preview">Preview URL</label>
                            <input class="form-control @error('preview') is-invalid @enderror" type="file" name="preview">
                            @error('preview')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fw-bolder m-0 py-1" for="tech">Technologies</label>
                            <div>
                                @foreach($technologies as $tech)
                                <div class="form-check-inline">
                                    <input type="checkbox" name="techs[]" class="form-check-input" value="{{$tech->id}}" {{ is_array(old('techs')) && in_array($technology->id, old('techs')) ? 'checked' : ''}}>
                                    <label for="" class="form-check-label">{{$tech->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fw-bolder m-0 py-1" for="description">Small description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" cols="10">{{old('description')}}</textarea>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-end my-3"><button type="submit" class="btn btn-success fw-bolder">Save</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection