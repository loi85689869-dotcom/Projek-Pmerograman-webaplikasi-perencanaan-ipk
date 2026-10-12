
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Target IPK - IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .target-page {
            max-width: 1000px;
            margin: 0 auto;
        }

        .target-header {
            background: var(--mint);
            border: 3px solid var(--border);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 6px 6px 0 var(--shadow);
        }

        .target-card {
            background: var(--paper);
            border: 3px solid var(--border);
            padding: 22px;
            margin-bottom: 24px;
            box-shadow: 6px 6px 0 var(--shadow);
        }

        .target-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .target-stat {
            background: var(--paper);
            border: 3px solid var(--border);
            padding: 18px;
            box-shadow: 4px 4px 0 var(--shadow);
            overflow-wrap: anywhere;
        }

        .target-stat:nth-child(2) {
            background: var(--mint);
        }

        .target-stat:nth-child(3) {
            background: var(--yellow);
        }

        .target-label {
            display: block;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .target-value {
            display: block;
            font-family: "Press Start 2P", monospace;
            font-size: clamp(16px, 2.5vw, 24px);
            color: var(--green-dark);
            overflow-wrap: anywhere;
        }

        .target-description {
            margin-bottom: 22px;
        }

        .target-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .target-form-grid label {
            display: block;
            margin-bottom: 8px;
        }

        .target-hint {
            display: block;
            margin-top: 8px;
            font-size: 13px;
        }

        .target-button {
            margin-top: 22px;
        }

        .target-result-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin: 22px 0;
        }

        .target-mini-card {
            background: var(--mint);
            border: 2px solid var(--border);
            padding: 16px;
            overflow-wrap: anywhere;
        }

        .target-mini-card span {
            display: block;
            margin-bottom: 10px;
        }

        .target-mini-card strong {
            color: var(--green-dark);
            font-size: 20px;
        }

        .target-notice {
            padding: 16px;
            border: 2px solid var(--border);
            background: var(--mint);
            margin-top: 16px;
            line-height: 1.7;
        }

        .target-notice.warning {
            background: var(--pink);
            border-color: #bd7b83;
        }

        .target-notice.info {
            background: var(--yellow);
        }

        .target-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .target-stats,
            .target-form-grid,
            .target-result-grid {
                grid-template-columns: 1fr;
            }

            .target-card,
            .target-header {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
<main class="target-page">

    <header class="target-header">
        <p>🎮 IPK PLANNER / AKADEMIK</p>
        <h1>Target IPK</h1>
        <p>
            Rencanakan target akademikmu dan cari tahu rata-rata
            bobot nilai yang dibutuhkan pada semester berikutnya.
        </p>
        <a class="ipk-back" href="/dashboard">← Kembali ke Dashboard</a>
    </header>

    <section class="target-stats">
        <div class="target-stat">
            <span class="target-label">IPK Saat Ini</span>
            <strong class="target-value">
                {{ number_format($ipk, 2) }}
            </strong>
        </div>

        <div class="target-stat">
            <span class="target-label">Total SKS Dinilai</span>
            <strong class="target-value">{{ $totalSks }}</strong>
        </div>

        <div class="target-stat">
            <span class="target-label">Total Nilai Mutu</span>
            <strong class="target-value">
                {{ number_format($totalNilai, 2) }}
            </strong>
        </div>
    </section>

    @if ($errors->any())
        <section class="alert-danger">
            <strong>Periksa kembali data kamu:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </section>
    @endif

    <section class="target-card">
        <h2>🌱 Simulasi Target IPK</h2>

        <p class="target-description">
            Masukkan target IPK kumulatif dan jumlah SKS yang
            direncanakan untuk semester mendatang.
        </p>

        <form method="POST" action="/target-ipk">
            @csrf

            <div class="target-form-grid">
                <div>
                    <label for="target_ipk">Target IPK (0–4,00)</label>
                    <input
                        type="number"
                        id="target_ipk"
                        name="target_ipk"
                        min="0"
                        max="4"
                        step="0.01"
                        placeholder="Contoh: 3.80"
                        value="{{ old('target_ipk', $targetIpk ?? '') }}"
                        required
                    >
                    <small class="target-hint">
                        IPK kumulatif yang ingin dicapai.
                    </small>
                </div>

                <div>
                    <label for="sks_mendatang">SKS Mendatang</label>
                    <input
                        type="number"
                        id="sks_mendatang"
                        name="sks_mendatang"
                        min="1"
                        max="200"
                        step="1"
                        placeholder="Contoh: 20"
                        value="{{ old('sks_mendatang', $sksMendatang ?? '') }}"
                        required
                    >
                    <small class="target-hint">
                        Jumlah SKS yang direncanakan.
                    </small>
                </div>
            </div>

            <button class="target-button" type="submit">
                🎯 Hitung Simulasi
            </button>
        </form>
    </section>

    @if (isset($rataRataDibutuhkan))
        <section class="target-card">
            <p>🎮 HASIL SIMULASI</p>
            <h2>Hasil Perhitungan</h2>

            <p>
                Target IPK {{ number_format($targetIpk, 2) }}
                dengan rencana {{ $sksMendatang }} SKS.
            </p>

            <div class="target-result-grid">
                <div class="target-mini-card">
                    <span>IPK Saat Ini</span>
                    <strong>{{ number_format($ipk, 2) }}</strong>
                </div>

                <div class="target-mini-card">
                    <span>Target IPK</span>
                    <strong>{{ number_format($targetIpk, 2) }}</strong>
                </div>

                <div class="target-mini-card">
                    <span>Rata-rata Bobot Dibutuhkan</span>
                    <strong>
                        {{ number_format($rataRataDibutuhkan, 2) }}
                    </strong>
                </div>

                <div class="target-mini-card">
                    <span>IPK Maksimal</span>
                    <strong>{{ number_format($ipkMaksimal, 2) }}</strong>
                </div>
            </div>

            @if ($targetBisaDicapai && $rataRataDibutuhkan > 0)
                <div class="target-notice">
                    <strong>🌟 Target bisa dicapai secara matematis!</strong>
                    <p>
                        Kamu membutuhkan rata-rata bobot nilai
                        {{ number_format($rataRataDibutuhkan, 2) }}
                        pada {{ $sksMendatang }} SKS mendatang.
                    </p>
                </div>

            @elseif ($targetBisaDicapai && $rataRataDibutuhkan <= 0)
                <div class="target-notice info">
                    <strong>🌱 Target sudah tercapai berdasarkan simulasi.</strong>
                </div>

            @else
                <div class="target-notice warning">
                    <strong>Target belum bisa dicapai dengan rencana ini.</strong>
                    <p>
                        IPK maksimal yang mungkin dicapai adalah
                        {{ number_format($ipkMaksimal, 2) }}.
                        Coba sesuaikan target IPK atau jumlah SKS.
                    </p>
                </div>
            @endif

            <p class="target-hint">
                Simulasi menggunakan bobot nilai maksimal 4,00.
                Hasil resmi tetap mengikuti aturan akademik kampus.
            </p>
        </section>
    @endif

    <footer class="target-footer">
        IPK Planner · Plan your progress. Build your future. 🌿
    </footer>

</main>
</body>
</html>
