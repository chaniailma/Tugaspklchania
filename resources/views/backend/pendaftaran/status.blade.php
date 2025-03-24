<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pendaftaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 p-4">

    <div class="bg-white p-6 rounded-lg shadow-md w-96 text-center">
        <h2 class="text-xl font-semibold mb-4">Status Pendaftaran</h2>

        @if(isset($pendaftaran))
            <div class="text-left">
                <p class="text-gray-700"><strong>Nama:</strong> {{ $pendaftaran->nama_lengkap }}</p>
                <p class="text-gray-700"><strong>NISN:</strong> {{ $pendaftaran->nisn }}</p>
                <p class="text-gray-700"><strong>Status:</strong> 
                    <span class="font-semibold {{ $pendaftaran->status == 'Diterima' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $pendaftaran->status }}
                    </span>
                </p>
            </div>
        @else
            <p class="text-red-500">Data pendaftaran tidak ditemukan.</p>
        @endif
    </div>

</body>
</html>