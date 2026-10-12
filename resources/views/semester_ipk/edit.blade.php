```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit IP Semester - IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .edit-page {
            max-width: 700px;
            margin: 0 auto;
        }

        .edit-header {
            background: var(--mint);
            border: 3px solid var(--border);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 6px 6px 0 var(--shadow);
        }

        .edit-card {
            background: var(--paper);
            border: 3px solid var(--border);
            padding: 24px;
            box-shadow: 6px 6px 0 var(--shadow);
        }

        .edit-card label {
            display: block;
            margin: 18px 0 8px;
        }

        .edit-card input {
            display: block;
            margin-bottom: 8px;
        }

        .edit-card button {
            margin-top: 22px;
        }

        .edit-error {
            background: var(--pink);
            border: 2px solid #bd7b83;
            padding: 12px;
            margin-bottom: 18px;
        }
    </style>
</head>

<body>
<main class="edit-page">

    <header class="edit-header">
        <p>🎮 IPK PLANNER / AKADEMIK</p>
        <h1>Edit IP Semester</h1>
        <p>Perbarui catatan IP semester kamu.</p>
    </header>

    <section class="edit-card">
        <h2>🌱 Informasi Semester</h2>

        @if ($errors->any())
            <div class="edit-error">
                <strong>Periksa kembali datamu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('semester-ipk.update', $entry) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <label for="semester"><strong>Semester ke-</strong></label>
            <input
                type="number"
                id="semester"
                name="semester"
                min="1"
                max="14"
                value="{{ old('semester', $entry->semester) }}"
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
                value="{{ old('ip', $entry->ip) }}"
                required
            >

            <label for="total_sks"><strong>Total SKS Semester</strong></label>
            <input
                type="number"
                id="total_sks"
                name="total_sks"
                min="1"
                max="100"
                value="{{ old('total_sks', $entry->total_sks) }}"
                required
            >

            <button type="submit">💾 Simpan Perubahan</button>
        </form>

        <p>
            <a class="ipk-back" href="{{ route('semester-ipk.index') }}">
                ← Kembali ke Kalkulator IPK
            </a>
        </p>
    </section>

</main>
</body>
</html>
```