
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #f5f3e8;
            --paper: #fffdf4;
            --green: #789b76;
            --green-dark: #476b4a;
            --mint: #dcebd8;
            --yellow: #f5dfa0;
            --pink: #f4dce0;
            --text: #344536;
            --border: #58785a;
            --shadow: #d6dfcd;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Trebuchet MS', Arial, sans-serif;
            line-height: 1.7;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1050px, 92%);
            margin: auto;
        }

        header {
            background: var(--paper);
            border-bottom: 3px solid var(--border);
            padding: 18px 0;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .brand {
            color: var(--green-dark);
            font-size: 18px;
            font-weight: 900;
        }

        .nav-links {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-links a,
        .button {
            display: inline-block;
            padding: 9px 14px;
            border: 2px solid var(--border);
            border-radius: 8px;
            background: var(--mint);
            font-weight: bold;
            font-size: 13px;
        }

        .nav-links a:hover,
        .button:hover {
            background: var(--yellow);
        }

        .hero {
            margin: 28px 0;
            padding: 32px 25px;
            background: var(--mint);
            border: 3px solid var(--border);
            border-radius: 14px;
            box-shadow: 6px 6px 0 var(--shadow);
        }

        .tag {
            display: inline-block;
            padding: 5px 11px;
            background: var(--paper);
            border: 2px solid var(--border);
            border-radius: 7px;
            font-size: 12px;
            font-weight: bold;
        }

        h1, h2, h3 {
            color: var(--green-dark);
            line-height: 1.35;
        }

        h1 {
            margin: 15px 0 10px;
            font-size: clamp(25px, 5vw, 38px);
        }

        h2 {
            font-size: 23px;
        }

        h3 {
            font-size: 17px;
        }

        .hero p {
            max-width: 700px;
        }

        .section-title {
            margin: 35px 0 15px;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            background: var(--paper);
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 4px 4px 0 var(--shadow);
        }

        .card p {
            margin-bottom: 12px;
        }

        .number {
            display: inline-grid;
            place-items: center;
            width: 36px;
            height: 36px;
            background: var(--yellow);
            border: 2px solid var(--border);
            border-radius: 8px;
            font-weight: 900;
        }

        .tip {
            margin: 25px 0;
            padding: 20px;
            background: var(--pink);
            border: 2px solid #a87580;
            border-radius: 12px;
        }

        .tip h3 {
            color: #804d59;
            margin-top: 0;
        }

        .checklist {
            padding-left: 22px;
        }

        .checklist li {
            margin: 8px 0;
        }

        .footer {
            margin-top: 40px;
            padding: 25px 0;
            text-align: center;
            background: var(--paper);
            border-top: 3px solid var(--border);
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .steps {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 23px 18px;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="container nav">
        <a href="/dashboard" class="brand">🌱 IPK PLANNER</a>

        <nav class="nav-links">
            <a href="/dashboard">🏠 Dashboard</a>
            <a href="/semesters">📚 Data Semester</a>
        </nav>
    </div>
</header>

<main class="container">

    <section class="hero">
        <span class="tag">📖 PANDUAN PEMULA</span>

        <h1>Selamat datang di buku petunjuk! 🎮</h1>

        <p>
            Tenang, kamu tidak sedang menghadapi ujian dadakan.
            Halaman ini akan menemani kamu mengenal IPK Planner
            satu per satu, tanpa perlu menebak-nebak tombol.
        </p>

        <p>
            Anggap saja ini game perjalanan akademik.
            Misi kita: kuliah lebih terencana, nilai lebih terpantau,
            dan tugas tidak semuanya dikerjakan saat mode panik. 😭
        </p>

        <a href="/dashboard" class="button">Mulai dari Dashboard →</a>
    </section>

    <h2 class="section-title">🗺️ Mulai petualanganmu</h2>

    <div class="steps">

        <article class="card">
            <span class="number">01</span>
            <h3>📚 Data Semester</h3>
            <p>
                Ini tempat memulai perjalanan akademikmu.
                Tambahkan semester yang ingin kamu kelola,
                lalu isi data sesuai petunjuk yang tersedia di aplikasi.
            </p>
            <p>
                <strong>Tips:</strong> Mulai dari semester yang sedang
                kamu jalani supaya datanya lebih mudah diperiksa.
            </p>
            <a href="/semesters" class="button">Buka Data Semester →</a>
        </article>

        <article class="card">
            <span class="number">02</span>
            <h3>📝 Mata Kuliah dan Nilai</h3>
            <p>
                Masukkan mata kuliah, jumlah SKS, dan nilai sesuai
                data akademikmu. Periksa kembali sebelum menyimpan,
                karena satu angka saja bisa memengaruhi hasil perhitungan.
            </p>
            <p>
                <strong>Ingat:</strong> Gunakan nilai yang benar-benar
                kamu miliki, bukan nilai hasil halusinasi sebelum ujian. 😆
            </p>
        </article>

        <article class="card">
            <span class="number">03</span>
            <h3>🧮 Kalkulator IPK</h3>
            <p>
                Gunakan kalkulator untuk membantu menghitung IPK
                berdasarkan nilai dan SKS yang dimasukkan.
                SKS penting karena setiap mata kuliah bisa punya
                bobot yang berbeda.
            </p>
            <p>
                <strong>Tips:</strong> Pastikan semua data nilai sudah
                benar. Kalkulator yang pintar pun tidak bisa menebak
                data yang belum kamu masukkan.
            </p>
            <a href="/kalkulator-ipk" class="button">Buka Kalkulator →</a>
        </article>

        <article class="card">
            <span class="number">04</span>
            <h3>🎯 Target IPK</h3>
            <p>
                Punya target IPK? Catat di sini agar kamu punya
                tujuan akademik yang lebih jelas.
                Jadikan target sebagai panduan, bukan alasan
                untuk memarahi diri sendiri.
            </p>
            <p>
                <strong>Tips:</strong> Buat target yang menantang,
                tetapi tetap masuk akal berdasarkan kondisimu.
            </p>
            <a href="/target-ipk" class="button">Buka Target IPK →</a>
        </article>

        <article class="card">
            <span class="number">05</span>
            <h3>📈 Rencana Mata Kuliah & Simulasi IPK</h3>
            <p>
                Ingin memperkirakan hasil IPK pada semester mendatang?
                Gunakan rencana mata kuliah dan simulasi untuk
                mencoba beberapa skenario nilai.
            </p>
            <p>
                <strong>Catatan:</strong> Hasil simulasi adalah perkiraan,
                bukan jaminan nilai akhir. Masa depan belum bisa
                di-spoiler sepenuhnya. 😄
            </p>
            <a href="/rencana-mata-kuliah" class="button">
                Buka Rencana Mata Kuliah →
            </a>
        </article>

        <article class="card">
            <span class="number">06</span>
            <h3>🗓️ Jadwal Belajar</h3>
            <p>
                Atur kegiatan belajar supaya waktumu lebih terarah.
                Setelah menyelesaikan kegiatan, tandai sesuai fitur
                yang tersedia di halaman jadwal.
            </p>
            <p>
                <strong>Tips:</strong> Mulai dari jadwal sederhana.
                Rencana yang realistis lebih berguna daripada jadwal
                superpadat yang cuma cantik di layar.
            </p>
            <a href="/jadwal-belajar" class="button">Buka Jadwal Belajar →</a>
        </article>

    </div>

    <section class="tip">
        <h3>💡 Tips biar nggak tersesat</h3>
        <ul class="checklist">
            <li>Isi data akademik secara bertahap dan teliti.</li>
            <li>Periksa kembali SKS, nilai, dan semester sebelum menyimpan.</li>
            <li>Kalau hasil perhitungan terasa aneh, periksa data yang dimasukkan terlebih dahulu.</li>
            <li>Gunakan simulasi untuk merencanakan, bukan memastikan nilai masa depan.</li>
            <li>Simpan password akunmu dengan aman dan jangan membagikannya.</li>
        </ul>
    </section>

    <section class="card">
        <h2>✅ Checklist sebelum mulai</h2>
        <p>Coba pastikan beberapa hal ini sudah siap:</p>

        <ul class="checklist">
            <li>Akun sudah berhasil dibuat dan kamu sudah login.</li>
            <li>Data semester sudah sesuai.</li>
            <li>Data mata kuliah, SKS, dan nilai sudah diperiksa.</li>
            <li>Kamu sudah tahu fitur yang ingin digunakan.</li>
        </ul>

        <p>
            Tidak harus selesai sekaligus, kok.
            Kerjakan sedikit demi sedikit. Yang penting,
            kamu tahu langkah berikutnya. 🌱
        </p>

        <a href="/dashboard" class="button">Oke, kembali ke Dashboard!</a>
    </section>

</main>

<footer class="footer">
    <div class="container">
        <strong>IPK Planner 🌱</strong>
        <p>
            Belajar merencanakan hari ini, melangkah menuju target esok hari.
        </p>
        <p>Pelan-pelan asal terarah. Kamu bukan robot SKS. 💚</p>
    </div>
</footer>

</body>
</html>
