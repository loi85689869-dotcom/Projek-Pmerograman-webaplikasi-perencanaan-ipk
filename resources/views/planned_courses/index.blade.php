<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Mata Kuliah - IPK App</title>
</head>
<body>

    <h1>Rencana Mata Kuliah Semester Berikutnya</h1>

    <p>
        Masukkan mata kuliah yang ingin kamu ambil dan perkiraan
        nilai yang ingin kamu dapatkan.
    </p>

    <hr>

    <h2>IPK Saat Ini</h2>

    <p>
        IPK: <strong>{{ number_format($ipk, 2) }}</strong>
    </p>

    <p>
        Total SKS yang sudah memiliki nilai:
        <strong>{{ $totalSks }} SKS</strong>
    </p>

    @if ($errors->any())
        <div>
            <p>Periksa kembali data berikut:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    <h2>Input Rencana Mata Kuliah</h2>

    <form method="POST" action="/rencana-mata-kuliah">
        @csrf

        <div id="daftar-mata-kuliah">

            <div class="mata-kuliah">
                <h3>Mata Kuliah 1</h3>

                <label>Nama Mata Kuliah</label><br>
                <input
                    type="text"
                    name="nama_mata_kuliah[]"
                    placeholder="Contoh: Struktur Data"
                    required
                >

                <br><br>

                <label>Jumlah SKS</label><br>
                <input
                    type="number"
                    name="sks[]"
                    min="1"
                    max="6"
                    value="3"
                    required
                >

                <br><br>

                <label>Perkiraan Nilai</label><br>
                <select name="nilai[]" required>
                    <option value="A">A - Bobot 4.00</option>
                    <option value="B" selected>B - Bobot 3.00</option>
                    <option value="C">C - Bobot 2.00</option>
                    <option value="E">E - Bobot 0.00</option>
                </select>

                <hr>
            </div>

        </div>

        <button type="button" onclick="tambahMataKuliah()">
            + Tambah Mata Kuliah
        </button>

        <br><br>

        <button type="submit">
            Hitung Simulasi IPK
        </button>
    </form>

    @if (isset($ipkSimulasi))

        <hr>

        <h2>Hasil Simulasi IPK</h2>

        <p>
            IPK Sebelum Simulasi:
            <strong>{{ number_format($ipk, 2) }}</strong>
        </p>

        <p>
            Total SKS Rencana:
            <strong>{{ $sksRencana }} SKS</strong>
        </p>

        <p>
            IP Semester Rencana:
            <strong>
                {{ $sksRencana > 0
                    ? number_format($nilaiRencana / $sksRencana, 2)
                    : '0.00' }}
            </strong>
        </p>

        <p>
            Total SKS Setelah Simulasi:
            <strong>{{ $totalSksSimulasi }} SKS</strong>
        </p>

        <h3>
            Perkiraan IPK Setelah Semester Berikutnya:
            {{ number_format($ipkSimulasi, 2) }}
        </h3>

        <h3>Rencana yang Dimasukkan</h3>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rencana as $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['sks'] }}</td>
                        <td>{{ $item['nilai'] }}</td>
                        <td>{{ number_format($item['bobot'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif

    <br>

    <a href="/dashboard">Kembali ke Dashboard</a>

    <script>
        let jumlahMataKuliah = 1;

        function tambahMataKuliah() {
            jumlahMataKuliah++;

            const daftar = document.getElementById(
                'daftar-mata-kuliah'
            );

            const div = document.createElement('div');
            div.className = 'mata-kuliah';

            div.innerHTML = `
                <h3>Mata Kuliah ${jumlahMataKuliah}</h3>

                <label>Nama Mata Kuliah</label><br>
                <input
                    type="text"
                    name="nama_mata_kuliah[]"
                    placeholder="Nama mata kuliah"
                    required
                >

                <br><br>

                <label>Jumlah SKS</label><br>
                <input
                    type="number"
                    name="sks[]"
                    min="1"
                    max="6"
                    value="3"
                    required
                >

                <br><br>

                <label>Perkiraan Nilai</label><br>
                <select name="nilai[]" required>
                    <option value="A">A - Bobot 4.00</option>
                    <option value="B" selected>B - Bobot 3.00</option>
                    <option value="C">C - Bobot 2.00</option>
                    <option value="E">E - Bobot 0.00</option>
                </select>

                <br><br>

                <button type="button"
                    onclick="this.parentElement.remove()">
                    Hapus Mata Kuliah
                </button>

                <hr>
            `;

            daftar.appendChild(div);
        }
    </script>

</body>
</html>