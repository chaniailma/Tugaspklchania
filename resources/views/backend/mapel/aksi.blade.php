<div class="d-flex gap-2">
    <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-warning btn-sm">
        <i class="fas fa-edit"></i> Edit
    </a>
    <form action="{{ route('mapel.delete', $mapel->id) }}" method="POST" class="delete-form d-inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger btn-sm delete-button">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </form>
</div>
