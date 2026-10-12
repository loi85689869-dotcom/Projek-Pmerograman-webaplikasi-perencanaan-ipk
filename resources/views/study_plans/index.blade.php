
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Belajar | IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .study-page {
            max-width: 1000px;
            margin: 0 auto;
        }

        .study-header {
            background: var(--mint);
            border: 3px solid var(--border);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 6px 6px 0 var(--shadow);
        }

        .study-header h1 {
            margin: 12px 0;
            color: var(--green-dark);
        }

        .study-subtitle {
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .study-panel {
            background: var(--paper);
            border: 3px solid var(--border);
            padding: 22px;
            margin-bottom: 24px;
            box-shadow: 6px 6px 0 var(--shadow);
        }

        .study-panel h2 {
            color: var(--green-dark);
            margin-top: 0;
            margin-bottom: 18px;
        }

        .study-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 18px;
        }

        .study-field label {
            display: block;
            margin-bottom: 8px;
        }

        .study-field input,
        .study-field select {
            width: 100%;
            min-width: 0;
            margin-bottom: 18px;
        }

        .study-button {
            display: inline-block;
            padding: 12px 16px;
            border: 3px solid var(--border);
            background: var(--green);
            color: #fffdf4;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 3px 3px 0 var(--shadow);
        }

        .study-button:hover {
            background: var(--green-dark);
            color: white;
        }

        .study-button.secondary {
            background: var(--yellow);
            color: var(--text);
        }

        .study-list {
            display: grid;
            gap: 16px;
        }

        .study-item {
            background: var(--paper);
            border: 2px solid var(--border);
            border-left: 7px solid var(--green);
            padding: 18px;
            overflow-wrap: anywhere;
        }

        .study-item.is-completed {
            background: var(--mint);
            border-left-color: var(--green-dark);
        }

        .study-item h3 {
            color: var(--green-dark);
            margin: 0 0 14px;
        }

        .study-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 12px 0;
        }

        .study-tag {
            display: inline-block;
            padding: 6px 10px;
            background: var(--mint);
            border: 1px solid var(--border);
            font-size: 13px;
        }

        .study-tag.hard {
            background: var(--pink);
        }

        .study-tag.medium {
            background: var(--yellow);
        }

        .study-tag.done {
            background: var(--mint);
            color: var(--green-dark);
            font-weight: bold;
        }

        .study-tag.pending {
            background: var(--yellow);
            font-weight: bold;
        }

        .study-item p {
            line-height: 1.7;
            margin: 8px 0;
        }

        .study-item form {
            margin-top: 16px;
        }

        .study-success {
            background: var(--mint);
            border: 2px solid var(--border);
            padding: 12px;
            margin-bottom: 16px;
        }

        .study-error {
            background: var(--pink);
            border: 2px solid #bd7b83;
            padding: 12px;
            margin-bottom: 16px;
        }

        .study-empty {
            text-align: center;
            padding: 24px 12px;
            background: var(--mint);
            border: 2px dashed var(--border);
            line-height: 1.8;
        }

        .study-back {
            margin: 8px 0 24px;
        }

        .study-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 12px;
        }

        @media (max-width: 650px) {
            .study-form-grid {
                grid-template-columns: 1fr;
            }

            .study-header,
            .study-panel {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
<main class="study-page">

    <header class="study-header">
        <p>🎮 IPK PLANNER / AKADEMIK</p>
        <h1>Jadwal Belajar</h1>
        <p class="study-subtitle">
            Atur waktu belajar, tentukan prioritas, dan pantau kegiatanmu
            supaya belajar lebih terarah.
        </p>

        <a href="/dashboard" class="ipk-back">
            ← Kembali ke Dashboard
        </a>
    </header>

    <section class="study-panel">
        <h2>🌱 Tambah Jadwal Belajar</h2>

        @if (session('success'))
            <div class="study-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="study-error">
                <strong>Periksa kembali data kamu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('study-plans.store') }}" method="POST">
            @csrf

            <div class="study-form-grid">
                <div class="study-field">
                    <label for="course_name">Nama Mata Kuliah</label>
                    <input
                        type="text"
                        id="course_name"
                        name="course_name"
                        value="{{ old('course_name') }}"
                        placeholder="Contoh: Kalkulus"
                        required
                    >
                </div>

                <div class="study-field">
                    <label for="difficulty">Tingkat Kesulitan</label>
                    <select id="difficulty" name="difficulty" required>
                        <option value="">Pilih tingkat kesulitan</option>
                        <option value="mudah" {{ old('difficulty') === 'mudah' ? 'selected' : '' }}>Mudah</option>
                        <option value="sedang" {{ old('difficulty') === 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="sulit" {{ old('difficulty') === 'sulit' ? 'selected' : '' }}>Sulit</option>
                    </select>
                </div>

                <div class="study-field">
                    <label for="day">Hari</label>
                    <select id="day" name="day" required>
                        <option value="">Pilih hari</option>
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                            <option value="{{ $day }}" {{ old('day') === $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="study-field">
                    <label for="start_time">Jam Mulai</label>
                    <input
                        type="time"
                        id="start_time"
                        name="start_time"
                        value="{{ old('start_time') }}"
                        required
                    >
                </div>

                <div class="study-field">
                    <label for="end_time">Jam Selesai</label>
                    <input
                        type="time"
                        id="end_time"
                        name="end_time"
                        value="{{ old('end_time') }}"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="study-button">
                + Simpan Jadwal
            </button>
        </form>
    </section>

    <section class="study-panel">
        <h2>📚 Daftar Jadwal Belajar</h2>

        @forelse ($studyPlans as $plan)
            <article class="study-item {{ $plan->is_completed ? 'is-completed' : '' }}">
                <h3>{{ $plan->course_name }}</h3>

                <p>
                    <strong>Hari:</strong> {{ $plan->day }}
                </p>

                <p>
                    <strong>Waktu:</strong>
                    {{ \Carbon\Carbon::parse($plan->start_time)->format('H:i') }}
                    – {{ \Carbon\Carbon::parse($plan->end_time)->format('H:i') }}
                </p>

                <div class="study-detail">
                    <span class="study-tag {{ $plan->difficulty === 'sulit' ? 'hard' : ($plan->difficulty === 'sedang' ? 'medium' : '') }}">
                        Kesulitan: {{ ucfirst($plan->difficulty) }}
                    </span>

                    <span class="study-tag">
                        Prioritas:
                        {{ $plan->difficulty === 'sulit' ? 'Tinggi' : ($plan->difficulty === 'sedang' ? 'Menengah' : 'Rendah') }}
                    </span>

                    @if ($plan->is_completed)
                        <span class="study-tag done">✓ Selesai</span>
                    @else
                        <span class="study-tag pending">Belum selesai</span>
                    @endif
                </div>

                <form
                    action="{{ route('study-plans.toggle', $plan) }}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="study-button secondary">
                        {{ $plan->is_completed ? 'Tandai Belum Selesai' : '✓ Tandai Selesai' }}
                    </button>
                </form>
            </article>
        @empty
            <div class="study-empty">
                <p>🌱 Belum ada jadwal belajar.</p>
                <p>Tambahkan jadwal pertamamu melalui formulir di atas!</p>
            </div>
        @endforelse
    </section>

    <div class="study-back">
        <a href="/dashboard" class="ipk-back">
            ← Kembali ke Dashboard
        </a>
    </div>

    <footer class="study-footer">
        IPK Planner · Plan your progress. Build your future. 🌿
    </footer>

</main>
</body>
</html>
