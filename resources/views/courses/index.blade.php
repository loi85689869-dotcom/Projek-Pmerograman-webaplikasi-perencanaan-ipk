<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah - IPK App</title>
</head>
<body>

    <h1>Mata Kuliah</h1>

    <p>
        Semester {{ $block->semester->semester }}
        - {{ $block->semester->tahun_ajaran }}
    </p>

    <p>
        Blok {{ $block->blok }}
        - {{ $block->nama_blok ?? 'Tanpa Nama' }}
    </p>

    <a href="/semesters/{{ $block->semester_id }}/blocks">
        ← Kembali ke Blok
    </a>

    <hr>

    <a href="/blocks/{{ $block->id }}/courses/create">
        + Tambah Mata Kuliah
    </a>

    <br><br>

    @if ($courses->count() > 0)

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($courses as $course)

                    @php
                        $studentCourse = $course->studentCourses->first();
                    @endphp

                    <tr>

                        <td>
                            {{ $course->kode_mata_kuliah }}
                        </td>

                        <td>
                            {{ $course->nama_mata_kuliah }}
                        </td>

                        <td>
                            {{ $course->sks }}
                        </td>

                        <td>
                            {{ $studentCourse->nilai ?? '-' }}
                        </td>

                        <td>
                            {{ $studentCourse->bobot ?? '-' }}
                        </td>

                        <td>

                            <a href="/courses/{{ $course->id }}/nilai">
                                Input Nilai
                            </a>

                            |

                            <a href="/courses/{{ $course->id }}/edit">
                                Edit
                            </a>

                            |

                            <form action="/courses/{{ $course->id }}"
                                  method="POST"
                                  style="display: inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>Belum ada mata kuliah di blok ini.</p>

    @endif

</body>
</html>