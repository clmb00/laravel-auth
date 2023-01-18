@extends('layouts.admin.admin')

@section('content')
    <div class="container-fluid px-5">
        <h3 class="mb-4">New Project</h3>

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Project name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="client_name" class="form-label">Client name</label>
                <input type="text" class="form-control" id="client_name" name="client_name">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <input type="text" class="form-control" id="summary" name="summary">
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image URL</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image">
            </div>
            <div class="row mt-5 container mx-auto">
                <div class="col-4">
                    <a class="btn btn-primary w-100" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-left-long"></i> Back</a>
                </div>
                <div class="col-4">
                    <button type="reset" class="btn btn-warning w-100"><i class="fa-solid fa-trash-can"></i> Reset</button>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-file-pen"></i> Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection
