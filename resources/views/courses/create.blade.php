<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah - IPK App</title>
</head>
<body>

    <h1>Tambah Mata Kuliah</h1>

    <p>
        Semester {{ $block->semester->semester }}
        - {{ $block->semester->tahun_ajaran }}
    </p>

    <p>
        Blok {{ $block->blok }}
        - {{ $block->nama_blok ?? 'Tanpa Nama' }}
    </p>

    <a href="/blocks/{{ $block->id }}/courses">
        ← Kembali ke Mata Kuliah
    </a>

    <hr>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/blocks/{{ $block->id }}/courses" method="POST">
        @csrf

        <div>
            <label>Kode Mata Kuliah</label>
            <input type="text"
                   name="kode_mata_kuliah"
                   value="{{ old('kode_mata_kuliah') }}"
                   placeholder="Contoh: 3KOM40115"
                   required>
        </div>

        <br>

        <div>
            <label>Nama Mata Kuliah</label>
            <input type="text"
                   name="nama_mata_kuliah"
                   value="{{ old('nama_mata_kuliah') }}"
                   placeholder="Contoh: Pemrograman Web"
                   required>
        </div>

        <br>

        <div>
            <label>SKS</label>
            <input type="number"
                   name="sks"
                   min="1"
                   max="6"
                   value="{{ old('sks') }}"
                   required>
        </div>

        <br>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>