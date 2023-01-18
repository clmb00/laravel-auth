@extends('layouts.admin.admin')

@section('content')
    <div class="container-fluid px-5">
        <h3 class="mb-4">Projects</h3>

        <table class="table table-striped table-hover table-bordered" style="border-color:rgba(71, 37, 95, 0.4);">
            <thead class="text-white" style="background-color: rgba(71, 37, 95, 0.6);">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Client Name</th>
                <th scope="col">Summary</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody class="table-hover">
                @forelse ($projects as $project)
                    <tr class="rows">
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->client_name }}</td>
                        <td>
                            <div style="height: 50px; overflow:auto;">
                                {{ $project->summary }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2 align-items-center" style="height: 50px">
                                <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}"><i class="fa-solid fa-circle-info"></i></a>
                                <a class="btn btn-warning" href=""><i class="fa-solid fa-file-pen"></i></a>
                                <a class="btn btn-danger" href=""><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h5>No Projects</h5>
                @endforelse
            </tbody>
          </table>
    </div>
@endsection
