<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPK Kumulatif - IPK App</title>
</head>
<body>

    <h1>IPK Kumulatif</h1>

    <hr>

    @if ($studentCourses->count() > 0)

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>Semester</th>
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
                            Semester
                            {{ $studentCourse->course->semester->semester }}
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
            IPK: {{ number_format($ipk, 2) }}
        </h2>

    @else

        <p>
            Belum ada nilai yang diinput.
        </p>

    @endif

    <br>

    <a href="/dashboard">
        ← Kembali ke Dashboard
    </a>

</body>
</html>