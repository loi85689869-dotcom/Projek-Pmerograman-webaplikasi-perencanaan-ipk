<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Semester - IPK App</title>
</head>
<body>

    <h1>Tambah Semester</h1>

    <a href="/semesters">← Kembali ke Data Semester</a>

    <hr>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/semesters" method="POST">
        @csrf

        <div>
            <label>Semester</label>
            <input type="number" name="semester" min="1" max="8"
                   value="{{ old('semester') }}" required>
        </div>

        <br>

        <div>
            <label>Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran"
                   placeholder="Contoh: 2026/2027"
                   value="{{ old('tahun_ajaran') }}" required>
        </div>

        <br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>