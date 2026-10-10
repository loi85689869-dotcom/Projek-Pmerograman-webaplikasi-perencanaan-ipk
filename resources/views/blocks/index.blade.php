<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blok Semester - IPK App</title>
</head>
<body>

    <h1>Blok Semester {{ $semester->semester }}</h1>

    <p>Tahun Ajaran: {{ $semester->tahun_ajaran }}</p>

    <a href="/semesters">
        ← Kembali ke Data Semester
    </a>

    <hr>

    @if ($blocks->count() > 0)

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>Blok</th>
                    <th>Nama Blok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($blocks as $block)

                    <tr>

                        <td>
                            Blok {{ $block->blok }}
                        </td>

                        <td>
                            {{ $block->nama_blok ?? '-' }}
                        </td>

                        <td>
                            <a href="/blocks/{{ $block->id }}/courses">
                                Lihat Mata Kuliah
                            </a>
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>Belum ada blok untuk semester ini.</p>

    @endif

</body>
</html>