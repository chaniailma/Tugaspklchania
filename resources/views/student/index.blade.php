<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Students</title>
</head>
<body>
    <h1>Ini Halaman Students</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Status</th>
        </tr>
        @foreach ($students as $index => $students)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $students->name }}</td>
            <td>{{ $students->email }}</td>
            <td>{{ $students->phone }}</td>
            <td>{{ $students->class }}</td>
            <td>{{ $students->address }}</td>
            <td>{{ ucfirst($students->gender) }}</td>
            <td>{{ ucfirst($students->status) }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
