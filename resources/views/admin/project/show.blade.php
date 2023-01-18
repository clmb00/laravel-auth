@extends('layouts.admin.admin')

@section('content')
<div class="container-fluid px-5">

    <h3><strong>Name:</strong> {{ $project->name }}</h3>
    <h3><strong>Client Name:</strong> {{ $project->client_name }}</h3>
    <div class="text-center my-5">
        <img src="{{ $project->cover_image }}" alt="{{ $project->name }}">
    </div>
    <p class="fs-4"><strong class="fs-3">Summary: </strong>{{ $project->summary }}</p>
    <hr class="mt-5">
    <h5>Created at: {{ $project->created_at }}</h5>
    <h5>Last Update: {{ $project->updated_at }}</h5>
    <h5>Slug: {{ $project->slug }}</h5>
    <h5>Id: {{ $project->id }}</h5>
    <div class="row mt-3 container mx-auto">
        <div class="col-4">
            <a class="btn btn-primary w-100" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-left-long"></i> Back</a>
        </div>
        <div class="col-4">
            <a class="btn btn-warning w-100" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-file-pen"></i> Edit</a>
        </div>
        <div class="col-4">
            <a class="btn btn-danger w-100" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-trash"></i> Cancel</a>
        </div>
    </div>
</div>
@endsection
