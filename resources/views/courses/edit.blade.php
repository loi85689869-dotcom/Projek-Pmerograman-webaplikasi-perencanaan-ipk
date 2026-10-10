<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah - IPK App</title>
</head>
<body>

    <h1>Edit Mata Kuliah</h1>

    <p>
        Semester {{ $course->semester->semester }}
        - {{ $course->semester->tahun_ajaran }}
    </p>

    <p>
        Blok {{ $course->block->blok }}
        - {{ $course->block->nama_blok ?? 'Tanpa Nama' }}
    </p>

    <a href="/blocks/{{ $course->block_id }}/courses">
        ← Kembali ke Mata Kuliah
    </a>

    <hr>

    <form action="/courses/{{ $course->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Kode Mata Kuliah</label>
            <input
                type="text"
                name="kode_mata_kuliah"
                value="{{ old('kode_mata_kuliah', $course->kode_mata_kuliah) }}"
                required
            >
        </div>

        <br>

        <div>
            <label>Nama Mata Kuliah</label>
            <input
                type="text"
                name="nama_mata_kuliah"
                value="{{ old('nama_mata_kuliah', $course->nama_mata_kuliah) }}"
                required
            >
        </div>

        <br>

        <div>
            <label>SKS</label>
            <input
                type="number"
                name="sks"
                value="{{ old('sks', $course->sks) }}"
                min="1"
                max="6"
                required
            >
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

</body>
</html>