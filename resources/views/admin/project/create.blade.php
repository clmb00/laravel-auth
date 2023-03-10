@extends('layouts.admin.admin')

@section('content')
    <div class="container-fluid px-5">
        <h3 class="mb-4">New Project</h3>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Project name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" maxlength="128" id="name" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="client_name" class="form-label">Client name</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" maxlength="64" id="client_name" name="client_name" value="{{old('client_name')}}">
                @error('client_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" value="{{old('cover_image')}}" onchange="showImage(event)">
                @error('cover_image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div class="text-center">
                    <img id="output-image" class="mt-4 preview_image" alt="">
                </div>
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea id="summary" name="summary" class="@error('summary') is-invalid @enderror"></textarea>
                @error('summary')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                <p>{{old('summary')}}</p>
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

        function showImage(event){
            const tagImage = document.getElementById('output-image');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
