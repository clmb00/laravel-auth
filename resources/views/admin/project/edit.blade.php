@extends('layouts.admin.admin')

@section('content')
    <div class="container-fluid px-5">
        <h3 class="mb-4">Edit '{{ $project->name}}'</h3>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Project name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$project->name}}">
            </div>
            <div class="mb-3">
                <label for="client_name" class="form-label">Client name</label>
                <input type="text" class="form-control" id="client_name" name="client_name" value="{{$project->client_name}}">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea id="summary" name="summary" value="{{$project->summary}}"></textarea>
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image URL</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image" value="{{$project->cover_image}}">
            </div>
            <div class="row mt-5 container mx-auto">
                <div class="col-4">
                    <a class="btn btn-primary w-100" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-left-long"></i> Back</a>
                </div>
                <div class="col-4">
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Confermi l\'eliminazione di: {{$project->name}}')"">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100" type="submit" title="delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-file-pen"></i> Done</button>
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
