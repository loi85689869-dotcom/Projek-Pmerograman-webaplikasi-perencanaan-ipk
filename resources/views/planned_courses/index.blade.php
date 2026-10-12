
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi IPK</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 16px;
            background: #080b09;
            color: #e8f5ec;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 720px;
            margin: auto;
        }

        h1 {
            color: #39ff88;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #a4b5aa;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .card {
            background: #111713;
            border: 1px solid #293b30;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 20px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .stat {
            background: #18231b;
            padding: 16px;
            border-radius: 10px;
        }

        .stat p {
            color: #a4b5aa;
            margin: 0 0 8px;
            font-size: 14px;
        }

        .stat strong {
            font-size: 25px;
            color: #39ff88;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            background: #080b09;
            color: white;
            border: 1px solid #3a5141;
            border-radius: 8px;
            font-size: 16px;
        }

        input:focus {
            outline: 2px solid #39ff88;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #39ff88;
            color: #07110a;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #20df70;
        }

        .result-title {
            color: #39ff88;
            margin-top: 0;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 0;
            border-bottom: 1px solid #293b30;
        }

        .result-row span {
            color: #b8c8bd;
        }

        .result-row strong {
            text-align: right;
        }

        .status {
            margin-top: 18px;
            padding: 14px;
            border-radius: 8px;
            background: #18231b;
            line-height: 1.6;
        }

        .success {
            color: #39ff88;
        }

        .warning {
            color: #ffd166;
        }

        .error {
            background: #351919;
            color: #ffaaaa;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .back-link {
            display: inline-block;
            color: #39ff88;
            text-decoration: none;
            margin-top: 8px;
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .result-row {
                flex-direction: column;
                gap: 6px;
            }

            .result-row strong {
                text-align: left;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Simulasi IPK</h1>
    <p class="subtitle">
        Perkirakan IPK kumulatifmu pada semester mendatang
        berdasarkan IPK dan total SKS yang sudah kamu masukkan.
    </p>

    <div class="card">
        <h2>Data Akademik Saat Ini</h2>

        <div class="stats">
            <div class="stat">
                <p>IPK Saat Ini</p>
                <strong>{{ number_format($ipk, 2) }}</strong>
            </div>

            <div class="stat">
                <p>Total SKS Saat Ini</p>
                <strong>{{ $totalSks }}</strong>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Rencana Semester Mendatang</h2>
        <p class="subtitle">
            Masukkan total SKS dan perkiraan IP semester, bukan nilai
            setiap mata kuliah.
        </p>

        @if ($errors->any())
            <div class="error">
                <strong>Periksa kembali input kamu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/rencana-mata-kuliah') }}" method="POST">
            @csrf

            <label for="target_ipk">Target IPK Kumulatif</label>
            <input
                type="number"
                id="target_ipk"
                name="target_ipk"
                min="0"
                max="4"
                step="0.01"
                value="{{ old('target_ipk', isset($targetIpk) ? $targetIpk : '3.75') }}"
                required
            >

            <label for="sks_rencana">Total SKS Semester Mendatang</label>
            <input
                type="number"
                id="sks_rencana"
                name="sks_rencana"
                min="1"
                max="200"
                value="{{ old('sks_rencana', $sksRencana ?? 20) }}"
                required
            >

            <label for="ip_rencana">Perkiraan IP Semester (0–4)</label>
            <input
                type="number"
                id="ip_rencana"
                name="ip_rencana"
                min="0"
                max="4"
                step="0.01"
                value="{{ old('ip_rencana', $ipRencana ?? '3.90') }}"
                required
            >

            <button type="submit">Hitung Simulasi IPK</button>
        </form>
    </div>

    @isset($ipkSimulasi)
        <div class="card">
            <h2 class="result-title">Hasil Simulasi</h2>

            <div class="result-row">
                <span>IPK Saat Ini</span>
                <strong>{{ number_format($ipk, 2) }}</strong>
            </div>

            <div class="result-row">
                <span>Perkiraan IP Semester</span>
                <strong>{{ number_format($ipRencana, 2) }}</strong>
            </div>

            <div class="result-row">
                <span>SKS Semester Mendatang</span>
                <strong>{{ $sksRencana }} SKS</strong>
            </div>

            <div class="result-row">
                <span>Total SKS Setelah Simulasi</span>
                <strong>{{ $totalSksSimulasi }} SKS</strong>
            </div>

            <div class="result-row">
                <span>Perkiraan IPK Kumulatif</span>
                <strong class="success">
                    {{ number_format($ipkSimulasi, 2) }}
                </strong>
            </div>

            <div class="result-row">
                <span>Perubahan IPK</span>
                <strong>
                    {{ $selisihIpk > 0 ? '+' : '' }}{{ number_format($selisihIpk, 2) }}
                    ({{ $analisisIpk }})
                </strong>
            </div>

            <div class="result-row">
                <span>Target IPK</span>
                <strong>{{ number_format($targetIpk, 2) }}</strong>
            </div>

            <div class="status">
                @if ($statusTarget === 'tercapai')
                    <strong class="success">Target terlampaui!</strong>
                    <p>Perkiraan IPK kamu berada di atas target.</p>
                @elseif ($statusTarget === 'pas')
                    <strong class="success">Target tercapai!</strong>
                    <p>Perkiraan IPK kamu sama dengan target.</p>
                @else
                    <strong class="warning">Target belum tercapai.</strong>
                    <p>
                        Perkiraan IPK masih kurang
                        {{ number_format(abs($selisihTarget), 2) }}
                        poin dari target.
                    </p>
                @endif
            </div>
        </div>
    @endisset

    <a href="{{ url('/dashboard') }}" class="back-link">
        ← Kembali ke Dashboard
    </a>

</div>
</body>
</html>
