<div class="d-flex gap-2">
    <!-- Tombol Edit -->
    <a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}" class="btn btn-warning btn-sm">
        <i class="fas fa-edit"></i> Edit
    </a>

    <!-- Tombol Detail -->
    <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}" class="btn btn-info btn-sm">
        <i class="fa fa-eye"></i> Detail
    </a>

    <!-- Tombol Hapus -->
    <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST" class="d-inline delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm delete-button" onclick="return confirm('Yakin ingin menghapus data ini?')">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </form>
</div>
