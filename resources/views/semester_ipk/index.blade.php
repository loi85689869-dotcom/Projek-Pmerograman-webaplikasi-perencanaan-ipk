
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator IPK - IPK Planner</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main class="ipk-page">

    <header class="ipk-header">
        <p>🎮 IPK PLANNER / AKADEMIK</p>
        <h1>Kalkulator IPK</h1>
        <p>Catat IP setiap semester dan pantau perkembangan akademikmu.</p>
    </header>

    <section class="ipk-summary">
        <div class="ipk-stat">
            <strong>Total SKS</strong>
            <span class="ipk-score">{{ $totalSks }}</span>
        </div>

        <div class="ipk-stat">
            <strong>Total Nilai Mutu</strong>
            <span class="ipk-score">{{ number_format($totalNilai, 2) }}</span>
        </div>

        <div class="ipk-stat">
            <strong>IPK Kumulatif</strong>
            <span class="ipk-score">{{ number_format($ipk, 2) }}</span>
        </div>
    </section>

    <section class="ipk-table-card">
        <h2>📚 Riwayat IP Semester</h2>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <p>Masukkan data IP dan total SKS dari setiap semester.</p>

        <form action="{{ route('semester-ipk.store') }}" method="POST">
            @csrf

            <label for="semester"><strong>Semester ke-</strong></label>
            <input
                type="number"
                id="semester"
                name="semester"
                min="1"
                max="14"
                value="{{ old('semester') }}"
                required
            >

            <label for="ip"><strong>IP Semester (0–4)</strong></label>
            <input
                type="number"
                id="ip"
                name="ip"
                min="0"
                max="4"
                step="0.01"
                value="{{ old('ip') }}"
                required
            >

            <label for="total_sks"><strong>Total SKS Semester</strong></label>
            <input
                type="number"
                id="total_sks"
                name="total_sks"
                min="1"
                max="100"
                value="{{ old('total_sks') }}"
                required
            >

            @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit">💾 Simpan IP Semester</button>
        </form>

        <hr>

        @if ($entries->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>IP</th>
                        <th>Total SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($entries as $entry)
                        <tr>
                            <td>{{ $entry->semester }}</td>
                            <td>{{ number_format($entry->ip, 2) }}</td>
                            <td>{{ $entry->total_sks }}</td>
                            <td>
                                <a
                                    class="ipk-back"
                                    href="{{ route('semester-ipk.edit', $entry) }}"
                                >Edit</a>

                                <form
                                    action="{{ route('semester-ipk.destroy', $entry) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus data IP semester ini?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>🌱 Belum ada data IP semester.</p>
            <p>Masukkan data pertamamu menggunakan formulir di atas.</p>
        @endif

        <p>
            <a class="ipk-back" href="/dashboard">
    ← Kembali ke Dashboard
</a>
        </p>
    </section>
</main>
</body>
</html>
