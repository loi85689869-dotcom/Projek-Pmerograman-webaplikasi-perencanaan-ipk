<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Blok - IPK App</title>
</head>
<body>

    <h1>Tambah Blok</h1>

    <p>
        Semester {{ $semester->semester }}
        - {{ $semester->tahun_ajaran }}
    </p>

    <a href="/semesters/{{ $semester->id }}/blocks">
        ← Kembali ke Blok
    </a>

    <hr>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/semesters/{{ $semester->id }}/blocks" method="POST">
        @csrf

        <div>
            <label>Blok</label>
            <select name="blok" required>
                <option value="">-- Pilih Blok --</option>
                <option value="1">Blok 1</option>
                <option value="2">Blok 2</option>
            </select>
        </div>

        <br>

        <div>
            <label>Nama Blok</label>
            <input type="text"
                   name="nama_blok"
                   placeholder="Contoh: Blok 1"
                   value="{{ old('nama_blok') }}">
        </div>

        <br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>