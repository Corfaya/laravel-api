@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="text-center pb-3">Projects</h1>
                    <a href="{{route('admin.projects.create')}}" class="text-decoration-none btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <table class="table table-striped mx-auto">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $p)
                            <tr>
                                <td class="fw-bold">{{$p->id}}</td>
                                <td class="text-capitalize fst-italic">{{$p->name}}</td>
                                <td>{{date('M d Y', strtotime($p->date_of_upload))}}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{route('admin.projects.show', ['project' => $p->id])}}" class="btn btn-sm btn-primary"><i class="bi bi-eyeglasses"></i></a>   
                                    <a href="{{route('admin.projects.edit', ['project' => $p->id])}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', ['project' => $p->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger project-remove" data-proj="{{$p->name}}"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.projects.partials.modal_del')
@endsection