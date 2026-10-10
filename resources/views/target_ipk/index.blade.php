<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Target IPK - IPK App</title>
</head>
<body>

    <h1>Target IPK</h1>

    <hr>

    <h2>IPK Saat Ini</h2>

    <p>
        <strong>{{ number_format($ipk, 2) }}</strong>
    </p>

    <p>
        Total SKS yang sudah memiliki nilai:
        <strong>{{ $totalSks }} SKS</strong>
    </p>

    <p>
        Total Nilai Mutu:
        <strong>{{ $totalNilai }}</strong>
    </p>

    <hr>

    <h2>Masukkan Target IPK</h2>

    <form method="POST" action="/target-ipk">
        @csrf

        <label for="target_ipk">
            Target IPK
        </label>

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

        <br><br>

        <label for="sks_mendatang">
            SKS yang Akan Diambil
        </label>

        <input
            type="number"
            id="sks_mendatang"
            name="sks_mendatang"
            min="1"
            max="200"
            placeholder="Contoh: 20"
            value="{{ old('sks_mendatang', $sksMendatang ?? '') }}"
            required
        >

        <br><br>

        <button type="submit">
            Hitung
        </button>
    </form>

    @if (isset($rataRataDibutuhkan))

        <hr>

        <h2>Hasil Perhitungan</h2>

        <p>
            Target IPK:
            <strong>{{ number_format($targetIpk, 2) }}</strong>
        </p>

        <p>
            SKS yang akan diambil:
            <strong>{{ $sksMendatang }} SKS</strong>
        </p>

        <p>
            Rata-rata bobot nilai yang dibutuhkan:
            <strong>{{ number_format($rataRataDibutuhkan, 2) }}</strong>
        </p>

        @if ($rataRataDibutuhkan > 4)

            <p>
                <strong>Target IPK tersebut belum bisa dicapai</strong>
                dengan {{ $sksMendatang }} SKS karena rata-rata bobot
                yang dibutuhkan lebih dari 4.00.
            </p>

        @elseif ($rataRataDibutuhkan <= 0)

            <p>
                Target IPK sudah tercapai berdasarkan perhitungan saat ini.
            </p>

        @elseif ($rataRataDibutuhkan <= 4)

            <p>
                Kamu perlu mendapatkan rata-rata bobot nilai minimal
                <strong>{{ number_format($rataRataDibutuhkan, 2) }}</strong>
                pada {{ $sksMendatang }} SKS berikutnya.
            </p>

        @endif

    @endif

    <br>

    <a href="/dashboard">
        ← Kembali ke Dashboard
    </a>

</body>
</html>