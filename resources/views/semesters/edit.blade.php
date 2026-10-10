<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Semester - IPK App</title>
</head>
<body>

    <h1>Edit Semester</h1>

    <a href="/semesters">← Kembali ke Data Semester</a>

    <hr>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/semesters/{{ $semester->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Semester</label>
            <input type="number"
                   name="semester"
                   min="1"
                   max="8"
                   value="{{ old('semester', $semester->semester) }}"
                   required>
        </div>

        <br>

        <div>
            <label>Tahun Ajaran</label>
            <input type="text"
                   name="tahun_ajaran"
                   value="{{ old('tahun_ajaran', $semester->tahun_ajaran) }}"
                   required>
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

</body>
</html>