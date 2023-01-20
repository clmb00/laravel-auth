@extends('layouts.admin.admin')

@section('content')
    <div class="container-fluid px-5">
        <h3 class="mb-4">Edit '{{ $project->name}}'</h3>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" id="saveForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Project name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $project->name)}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="client_name" class="form-label">Client name</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{old('client_name', $project->client_name)}}">
                @error('client_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea id="summary" name="summary" class="@error('summary') is-invalid @enderror"></textarea>
                @error('summary')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <p>{{old('summary', $project->summary)}}"</p>
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image URL</label>
                <input type="text" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" value="{{old('cover_image', $project->cover_image)}}">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="row mt-5 container mx-auto">
                <div class="col-6">
                    <a class="btn btn-primary w-100" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-left-long"></i> Back</a>
                </div>
                <div class="col-6">
                    <button type="submit" form="saveForm" class="btn btn-success w-100"><i class="fa-solid fa-file-pen"></i> Done</button>
                </div>
            </div>
        </form>

    </div>

<script>
    ClassicEditor
        .create( document.querySelector( '#summary' ), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', '|', 'undo', 'redo' ]
        } )
        .then( editor => {
            console.log( editor );
        } )
       .catch( error => {
            console.error( error );
        } );
</script>
@endsection
