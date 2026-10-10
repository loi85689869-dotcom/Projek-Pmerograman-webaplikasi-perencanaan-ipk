<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai - IPK App</title>
</head>
<body>

    <h1>Input Nilai</h1>

    <p>
        Semester {{ $course->semester->semester }}
        - {{ $course->semester->tahun_ajaran }}
    </p>

    <p>
        Blok {{ $course->block->blok }}
        - {{ $course->block->nama_blok ?? 'Tanpa Nama' }}
    </p>

    <hr>

    <p>
        <strong>Kode:</strong>
        {{ $course->kode_mata_kuliah }}
    </p>

    <p>
        <strong>Mata Kuliah:</strong>
        {{ $course->nama_mata_kuliah }}
    </p>

    <p>
        <strong>SKS:</strong>
        {{ $course->sks }}
    </p>

    <hr>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/courses/{{ $course->id }}/nilai" method="POST">

        @csrf

        <div>
            <label>Nilai</label>

            <select name="nilai" required>

                <option value="">-- Pilih Nilai --</option>

                <option value="A"
                    {{ old('nilai', $studentCourse->nilai ?? '') == 'A' ? 'selected' : '' }}>
                    A
                </option>

                <option value="B"
                    {{ old('nilai', $studentCourse->nilai ?? '') == 'B' ? 'selected' : '' }}>
                    B
                </option>

                <option value="C"
                    {{ old('nilai', $studentCourse->nilai ?? '') == 'C' ? 'selected' : '' }}>
                    C
                </option>

                <option value="E"
                    {{ old('nilai', $studentCourse->nilai ?? '') == 'E' ? 'selected' : '' }}>
                    E
                </option>

            </select>
        </div>

        <br>

        <button type="submit">
            Simpan Nilai
        </button>

    </form>

    <br>

    <a href="/blocks/{{ $course->block_id }}/courses">
        ← Kembali ke Mata Kuliah
    </a>

</body>
</html>