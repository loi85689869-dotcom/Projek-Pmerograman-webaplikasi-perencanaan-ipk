<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Semester - IPK App</title>
</head>
<body>

    <h1>Data Semester</h1>

    <a href="/dashboard">← Kembali ke Dashboard</a>

    <hr>

    @if ($semesters->count() > 0)

        <table border="1" cellpadding="8">
            <thead>
    <tr>
        <th>Semester</th>
        <th>Tahun Ajaran</th>
        <th>Aksi</th>
    </tr>
</thead>

            <tbody>
                @foreach ($semesters as $semester)
    <tr>
        <td>{{ $semester->semester }}</td>
        <td>{{ $semester->tahun_ajaran }}</td>
        <td>
            <a href="/semesters/{{ $semester->id }}/edit">
                Edit
            </a>

            <form action="/semesters/{{ $semester->id }}"
                  method="POST"
                  style="display: inline;">
                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus semester ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>

    @else

        <p>Belum ada data semester.</p>

    @endif

</body>
</html>
