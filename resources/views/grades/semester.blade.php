<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPS Semester - IPK App</title>
</head>
<body>

    <h1>Hasil IPS Semester</h1>

    <p>
        Semester {{ $semester->semester }}
        - {{ $semester->tahun_ajaran }}
    </p>

    <hr>

    @if ($studentCourses->count() > 0)

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai</th>
                    <th>Bobot</th>
                    <th>SKS × Bobot</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($studentCourses as $studentCourse)

                    <tr>

                        <td>
                            {{ $studentCourse->course->kode_mata_kuliah }}
                        </td>

                        <td>
                            {{ $studentCourse->course->nama_mata_kuliah }}
                        </td>

                        <td>
                            {{ $studentCourse->course->sks }}
                        </td>

                        <td>
                            {{ $studentCourse->nilai }}
                        </td>

                        <td>
                            {{ $studentCourse->bobot }}
                        </td>

                        <td>
                            {{ $studentCourse->course->sks * $studentCourse->bobot }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

        <hr>

        <p>
            <strong>Total SKS:</strong>
            {{ $totalSks }}
        </p>

        <p>
            <strong>Total Nilai Mutu:</strong>
            {{ $totalNilai }}
        </p>

        <h2>
            IPS: {{ number_format($ip, 2) }}
        </h2>

    @else

        <p>
            Belum ada nilai yang diinput untuk semester ini.
        </p>

    @endif

    <br>

    <a href="/semesters/{{ $semester->id }}/blocks">
        ← Kembali ke Blok
    </a>

</body>
</html>