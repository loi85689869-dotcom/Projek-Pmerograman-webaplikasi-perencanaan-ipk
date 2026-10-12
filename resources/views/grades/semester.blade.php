
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPS Semester - IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="ipk-page">

        <header class="ipk-header">
            <p>🎮 IPK PLANNER / AKADEMIK</p>
            <h1>IPS Semester</h1>
            <p>
                Semester {{ $semester->semester }}
                — {{ $semester->tahun_ajaran }}
            </p>
        </header>

        @if ($studentCourses->count() > 0)

            <section class="ipk-table-card">
                <h2>📚 Rekap Mata Kuliah</h2>

                <table>
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
                                <td>{{ $studentCourse->course->sks }}</td>
                                <td>{{ $studentCourse->nilai }}</td>
                                <td>{{ $studentCourse->bobot }}</td>
                                <td>
                                    {{ $studentCourse->course->sks * $studentCourse->bobot }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <section class="ipk-summary">
                <div class="ipk-stat">
                    <strong>📘 Total SKS</strong>
                    <div class="ipk-score">{{ $totalSks }}</div>
                </div>

                <div class="ipk-stat">
                    <strong>⭐ Total Nilai Mutu</strong>
                    <div class="ipk-score">{{ $totalNilai }}</div>
                </div>

                <div class="ipk-stat">
                    <strong>🏆 IPS Semester</strong>
                    <div class="ipk-score">
                        {{ number_format($ip, 2) }}
                    </div>
                </div>
            </section>

        @else

            <section class="ipk-table-card">
                <h2>🌱 Belum Ada Nilai</h2>
                <p>Belum ada nilai yang diinput untuk semester ini.</p>
            </section>

        @endif

        <a class="ipk-back"
           href="/semesters/{{ $semester->id }}/blocks">
            ← Kembali ke Daftar Blok
        </a>

        <br>

        <a class="ipk-back" href="/dashboard">
            ← Kembali ke Dashboard
        </a>

    </main>
</body>
</html>
