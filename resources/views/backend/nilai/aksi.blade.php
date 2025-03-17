<div class="d-flex gap-2">
    <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning btn-sm">
        <i class="fas fa-edit"></i> Edit
    </a>
    <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-sm btn-danger delete-button">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </form>
</div>
