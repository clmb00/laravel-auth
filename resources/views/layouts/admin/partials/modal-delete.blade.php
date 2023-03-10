<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$project->id}}">
    <i class="fa-solid fa-trash"></i>
</button>

<div class="modal fade" id="modal{{$project->id}}" tabindex="-1" aria-labelledby="modalLabel{{ $project->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalLabel{{ $project->id }}">Delete project</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Confermi l'eliminazione di: '{{ $project->name }}''
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" title="delete">Delete</button>
          </form>
        </div>
      </div>
    </div>
</div>
