@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                    <h1 class="mb-5">Project details</h1>
            </div>
            <div class="col-6">
                <div class="project-box-img">
                    @if (Str::startsWith($project->preview, 'https'))
                        <img src="{{$project->preview}}" alt="Project {{$project->name}}">
                    @else
                        <img src="{{asset('storage/'.$project->preview)}}" alt="Project {{$project->name}}">
                    @endif
                </div>
            </div>
            <div class="col-6 pe-5">
               <div class="text-end pb-5">
                    <h1><strong class="text-uppercase">{{$project->name}}</strong> project</h1>
                    <p>Added on: {{$project->date_of_upload}}</p>
                    <p>{{$project->description}}</p>
               </div>
               <div class="pt-3 d-flex align-items-end justify-content-end">
                <h5>Field: 
                    @if ($project->type)
                        <strong>{{$project->type->name}}</strong>
                    @else
                        <strong>Unspecified</strong>
                    @endif
                </h5>
               </div>
               <div class="pt-1 d-flex align-items-end justify-content-end">
                <h5>Technologies:
                    @forelse($project->technologies as $tech)
                        <strong>{{$tech->name}}</strong>
                    @empty
                        <strong>Unspecified</strong>
                    @endempty
                </h5>
               </div>
            </div>
        </div>
    </div>
@endsection