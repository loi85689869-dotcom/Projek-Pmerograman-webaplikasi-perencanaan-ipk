
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Semester - IPK Planner</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="ipk-page">

        <header class="ipk-header">
            <p>🎮 IPK PLANNER / AKADEMIK</p>
            <h1>Tambah Semester</h1>
            <p>Catat semester baru dalam perjalanan kuliahmu.</p>
        </header>

        <section class="ipk-table-card">
            <h2>🌱 Data Semester Baru</h2>

            <p>Isi informasi semester dengan benar, ya!</p>

            @if ($errors->any())
                <div class="alert-danger">
                    <strong>Periksa kembali datamu:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/semesters" method="POST">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="semester">
                        <strong>Semester</strong>
                    </label>

                    <input
                        type="number"
                        id="semester"
                        name="semester"
                        min="1"
                        max="8"
                        value="{{ old('semester') }}"
                        placeholder="Contoh: 1"
                        required
                    >

                    <small>Masukkan nomor semester, dari 1 sampai 8.</small>
                </div>

                <div style="margin-bottom: 24px;">
                    <label for="tahun_ajaran">
                        <strong>Tahun Ajaran</strong>
                    </label>

                    <input
                        type="text"
                        id="tahun_ajaran"
                        name="tahun_ajaran"
                        placeholder="Contoh: 2026/2027"
                        value="{{ old('tahun_ajaran') }}"
                        required
                    >
                </div>

                <button type="submit">💾 Simpan Semester</button>

                <a class="ipk-back" href="/semesters">
                    ← Kembali ke Data Semester
                </a>
            </form>
        </section>

    </main>
</body>
</html>