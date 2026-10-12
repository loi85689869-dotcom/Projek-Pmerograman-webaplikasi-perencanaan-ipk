
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

   
<style>
    * {
        box-sizing: border-box;
    }

   body {
    margin: 0;
    padding: 25px 16px;
    background: #0b100d;
    color: #e2eee3;
    font-family: 'Trebuchet MS', Arial, sans-serif;
    line-height: 1.6;

    position: relative;
    isolation: isolate;
    overflow-x: hidden;
}

    .container {
    max-width: 1000px;
    margin: auto;
    position: relative;
    z-index: 1;
}

    .header,
    .panel {
        background: #17231b;
        border: 2px solid #42664b;
        border-radius: 14px;
        padding: 22px;
        margin-bottom: 22px;
        box-shadow: 5px 5px 0 #050806;
    }

    h1,
    h2,
    h3 {
        color: #b9e8c1;
    }

    h1 {
        margin: 0 0 8px;
        font-size: clamp(25px, 4vw, 34px);
    }

    .header p {
        margin: 5px 0;
    }

    .motivation {
        background: #192c20;
        border-color: #557c5e;
    }

    .guide {
        background: #292b1d;
        border-color: #9b8953;
    }

    .guide h2 {
        margin-top: 0;
        color: #e3ce91;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .menu-link {
        display: block;
        padding: 15px;
        background: #142019;
        border: 2px solid #42664b;
        border-radius: 10px;
        color: #d7ead9;
        font-weight: bold;
        text-decoration: none;
        transition: 0.2s;
    }

    .menu-link:hover {
        background: #243c2b;
        border-color: #8cc998;
        transform: translateY(-2px);
        box-shadow: 0 0 12px #355b3b66;
    }

    .menu-link small {
        display: block;
        margin-top: 4px;
        color: #b3c8b6;
        font-weight: normal;
    }

    .button {
        display: inline-block;
        padding: 10px 15px;
        background: #326542;
        border: 2px solid #719b78;
        border-radius: 8px;
        color: #ffffff;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        transition: 0.2s;
    }

    .button:hover {
        background: #447c52;
        box-shadow: 0 0 12px #477f5055;
    }

    .logout {
        background: #352127;
        border-color: #86535e;
        color: #f0cbd2;
    }

    .logout:hover {
        background: #50303a;
    }

    #pesan {
        color: #d5e8d6;
        font-weight: bold;
        min-height: 28px;
        margin: 12px 0 18px;
    }

    .footer {
        text-align: center;
        padding: 15px;
        color: #91b99a;
        font-size: 13px;
    }

    /* Tampilan responsif untuk HP dan layar kecil */
    @media (max-width: 650px) {
        body {
            padding: 14px 10px;
        }

        .container {
            width: 100%;
        }

        .menu-grid {
            grid-template-columns: 1fr;
        }

        .panel,
        .header {
            padding: 15px;
            margin-bottom: 16px;
        }

        h1 {
            font-size: 25px;
        }

        h2 {
            font-size: 20px;
        }

        .button {
            max-width: 100%;
            white-space: normal;
        }
    }



.neon-snow {
    position: fixed;
    inset: 0;
    overflow: hidden;
    pointer-events: none;
    z-index: 0;
}

.neon-snow span {
    position: absolute;
    top: -20px;
    left: var(--left);
    width: var(--size);
    height: var(--size);
    border-radius: 50%;
    background: #baffc5;
    box-shadow:
        0 0 5px #62ff8b,
        0 0 12px #39e86a,
        0 0 20px #39e86a66;
    opacity: 0;
    animation: snowFall var(--duration) linear var(--delay) infinite;
}

@keyframes snowFall {
    0% {
        transform: translate3d(0, -10px, 0);
        opacity: 0;
    }

    10% {
        opacity: 0.9;
    }

    85% {
        opacity: 0.7;
    }

    100% {
        transform: translate3d(var(--drift), 105vh, 0);
        opacity: 0;
    }
}

</style>

</head>

<body>


<div class="neon-snow" aria-hidden="true">
    <span style="--left:5%;--size:3px;--duration:9s;--delay:-2s;--drift:30px"></span>
    <span style="--left:13%;--size:5px;--duration:12s;--delay:-7s;--drift:-20px"></span>
    <span style="--left:22%;--size:3px;--duration:10s;--delay:-4s;--drift:40px"></span>
    <span style="--left:31%;--size:4px;--duration:14s;--delay:-9s;--drift:-30px"></span>
    <span style="--left:40%;--size:3px;--duration:8s;--delay:-1s;--drift:25px"></span>
    <span style="--left:49%;--size:5px;--duration:13s;--delay:-6s;--drift:-35px"></span>
    <span style="--left:58%;--size:3px;--duration:11s;--delay:-3s;--drift:20px"></span>
    <span style="--left:67%;--size:4px;--duration:15s;--delay:-10s;--drift:-25px"></span>
    <span style="--left:76%;--size:3px;--duration:9s;--delay:-5s;--drift:35px"></span>
    <span style="--left:85%;--size:5px;--duration:12s;--delay:-8s;--drift:-20px"></span>
    <span style="--left:94%;--size:3px;--duration:10s;--delay:-3s;--drift:30px"></span>
    <span style="--left:17%;--size:2px;--duration:16s;--delay:-12s;--drift:15px"></span>
    <span style="--left:36%;--size:2px;--duration:11s;--delay:-6s;--drift:-15px"></span>
    <span style="--left:62%;--size:2px;--duration:14s;--delay:-4s;--drift:20px"></span>
    <span style="--left:91%;--size:2px;--duration:13s;--delay:-9s;--drift:-30px"></span>
</div>

<div class="container">

    <header class="header">
        <h1>🌱 IPK Planner</h1>

        <p>Halo, <strong>{{ $user->name }}</strong>! 💚</p>

        <p>
            Selamat datang kembali! Yuk, atur perjalanan akademikmu.
            Tenang, kita tidak harus menyelesaikan satu semester dalam sehari. 😭
        </p>
    </header>

    <section class="panel guide">
        <h2>📖 Baru di IPK Planner?</h2>

        <p>
            Belum tahu harus mulai dari mana? Santai!
            Buka panduan untuk mengenal semua fitur dan cara menggunakannya.
            Tidak ada ujian dadakan di halaman ini. 😆
        </p>

        <a href="/panduan" class="button">Baca Panduan Lengkap →</a>
    </section>

    <section class="panel motivation">
        <h2>🎲 Kata-Kata Hari Ini</h2>

        <p id="pesan" aria-live="polite">Memuat kata-kata...</p>

        <button type="button" class="button" onclick="gantiPesan()">
            Kata Lain Dong 🎲
        </button>
    </section>

    <section class="panel">
        <h2>🗺️ Menu Utama</h2>
        <p>Pilih fitur yang mau kamu gunakan hari ini.</p>

        <div class="menu-grid">
            <a href="/ipk" class="menu-link">
                📊 Lihat IPK
                <small>Pantau hasil akademikmu.</small>
            </a>

            <a href="/kalkulator-ipk" class="menu-link">
                🧮 Kalkulator IPK
                <small>Bantu hitung IPK berdasarkan data nilai.</small>
            </a>

            <a href="/target-ipk" class="menu-link">
                🎯 Target IPK
                <small>Tentukan target akademikmu.</small>
            </a>

            <a href="/rencana-mata-kuliah" class="menu-link">
                📈 Simulasi IPK
                <small>Coba skenario nilai semester mendatang.</small>
            </a>

            <a href="/semesters" class="menu-link">
                📚 Data Semester
                <small>Lihat dan kelola semester.</small>
            </a>

            <a href="/semesters/create" class="menu-link">
                ➕ Tambah Data Semester
                <small>Tambahkan semester baru.</small>
            </a>

            <a href="/jadwal-belajar" class="menu-link">
                🗓️ Jadwal Belajar
                <small>Atur rencana kegiatan belajarmu.</small>
            </a>

            <a href="/panduan" class="menu-link">
                📖 Panduan IPK Planner
                <small>Pelajari fungsi setiap fitur.</small>
            </a>
        </div>
    </section>

    <section class="panel">
        <h2>🚪 Mau keluar dulu?</h2>

        <p>Jangan lupa simpan pekerjaanmu jika diperlukan sebelum keluar akun.</p>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="button logout">Logout</button>
        </form>
    </section>

    <footer class="footer">
        <p>🌱 IPK Planner — Pelan-pelan asal terarah.</p>
        <p>IPK adalah angka, tetapi proses belajarmu juga berarti. 💚</p>
    </footer>

</div>

<script>
const motivasi = [
    "IPK boleh 4,0, tapi kalau dia bilang 'kita temenan aja', ya tetap remedial percintaan.",
    "Datang ke kampus niatnya belajar, pulang-pulang malah kepikiran senyum seseorang dari kelas sebelah.",
    "Dia bilang 'hati-hati ya pulangnya'. Aku senyum seharian. Dia mungkin sudah lupa lima menit kemudian.",
    "Naksir teman sekelas itu seru, sampai dosen menyuruh kerja kelompok dan ternyata dia satu kelompok sama orang lain.",
    "Aku bukan malas masuk kelas pagi, aku cuma berharap dia sadar kalau bangku sebelahku kosong.",
    "Chat dibalas 'wkwk' doang. Tidak apa-apa, setidaknya aku tidak perlu bingung membalas paragraf sepanjang makalah.",
    "Dia online, aku online, kami sama-sama online, tapi komunikasi kami seperti dua server beda negara.",
    "Katanya cinta itu buta. Pantas aku tidak melihat tanda-tanda dia suka balik.",
    "Kalau dia jadi soal ujian, mungkin aku bakal belajar sampai subuh. Sayangnya, dia bukan mata kuliah yang bisa diulang.",
    "Sudah tampil rapi ke kampus, eh ternyata dia tidak masuk. Baiklah, hari ini outfit-ku hanya disaksikan satpam.",
    "Jangan mengejar yang belum tentu suka. Deadline saja sudah jelas mengejarmu setiap hari.",
    "Aku tidak berharap banyak, cuma berharap dia tiba-tiba bilang, 'Eh, duduk sini aja.' Terus aku senyum seperti orang dapat beasiswa.",
    "Dia mengirim stiker ketawa, aku sudah membayangkan nama anak. Tolong, imajinasi ini perlu dikasih SKS pengendalian diri.",
    "Kalau kangen bisa dikonversi jadi SKS, mungkin aku sudah lulus lebih cepat.",
    "Dia bilang 'terserah kamu'. Ternyata itu bukan kebebasan, melainkan soal pilihan ganda tanpa kunci jawaban.",
    "Jangan sedih karena dia tidak melihatmu. Bisa jadi dia juga sedang sibuk mencari ruang kelas.",
    "Punya crush satu kampus itu hemat biaya, tapi boros waktu karena matanya sibuk mencari seseorang.",
    "Kalau dia tidak membalas chat, jangan langsung bikin teori konspirasi. Mungkin dia memang sedang sibuk atau belum sempat membuka HP.",
    "Status hubungan: mahasiswa aktif, tugas aktif, perasaan juga aktif padahal tidak diminta.",
    "Cinta boleh bertepuk sebelah tangan, tetapi tepuk tangan saat teman presentasi harus dua tangan, ya.",

    "Dosen bilang 'materinya gampang'. Mahasiswa saling pandang seperti baru mendengar bahasa dari planet lain.",
    "Masuk kelas jam delapan, berangkat jam tujuh, bangun jam lima, tapi tetap panik karena belum menemukan kaus kaki.",
    "Kalimat paling menenangkan di kampus: 'Hari ini dosennya tidak masuk, teman-teman.'",
    "Kalimat paling bikin jantung olahraga: 'Sebelum mulai, saya mau tanya materi minggu lalu.'",
    "Pas dosen bilang 'silakan pilih kelompok sendiri', langsung terlihat siapa yang punya banyak teman dan siapa yang pura-pura sibuk buka laptop.",
    "Duduk paling depan niatnya fokus. Lima menit kemudian malah jadi sukarelawan menjawab pertanyaan dosen.",
    "Duduk paling belakang niatnya santai. Eh, dosen malah hafal namamu.",
    "Presentasi kelompok: satu orang menjelaskan, satu orang mengatur slide, satu orang jadi operator, satu orang tiba-tiba kehilangan sinyal.",
    "Teman bilang tugasnya sudah selesai. Aku membuka laptop dan baru sadar belum membuat folder tugasnya.",
    "Kampus itu tempat menuntut ilmu sekaligus belajar membaca ekspresi dosen saat melihat slide presentasi.",
    "Dosen: 'Ada yang mau bertanya?' Satu kelas hening. Setelah kelas selesai, pertanyaannya muncul 47 biji di grup.",
    "Kalau dosen bilang 'ini tidak masuk ujian', jangan langsung percaya diri. Catat dulu, siapa tahu plot twist.",
    "Pergi ke kampus membawa laptop, charger, buku, dan harapan. Pulang membawa tugas tambahan.",
    "Jam kosong satu jam itu anugerah. Lima menit pertama senang, 55 menit berikutnya bingung mau ke mana.",
    "Tugas kelompok mengajarkan kerja sama, komunikasi, kesabaran, dan seni mengirim pesan tanpa terdengar emosi.",
    "Kalau teman bertanya 'sudah mengerjakan tugas?', jangan panik. Jawab dengan jujur, lalu mulai kerjakan kalau belum.",
    "Ada dua jenis mahasiswa saat dosen membagikan nilai: yang langsung membuka, dan yang berdoa dulu sambil menutup mata.",
    "Salah masuk kelas itu bukan tersesat, itu eksplorasi lingkungan kampus tanpa pemandu wisata.",
    "Pulang kuliah rasanya lega. Sampai membuka grup dan membaca, 'Guys, ada tugas tambahan ya.'",
    "Jadwal kuliah boleh padat, tetapi jangan sampai jadwal makan hanya diisi kalimat 'nanti saja'.",

    "Tugas dikumpulkan pukul 23.59. Pukul 23.58 baru sadar file yang diunggah ternyata versi kemarin.",
    "Katanya cuma revisi sedikit. Setelah dibuka, ternyata sedikitnya ada 17 bagian.",
    "Aku dan error coding sudah seperti teman dekat. Bedanya, teman dekat biasanya memberi solusi, bukan pesan merah.",
    "Program sudah berjalan lancar. Aku tidak berani menyentuh apa-apa lagi karena takut merusak kedamaian.",
    "Sudah mengetik kode panjang, ternyata lupa titik koma. Satu karakter, seribu emosi.",
    "Kalau kode error bisa curhat, mungkin dia juga bingung melihat cara kita menulisnya.",
    "Buka laptop untuk mengerjakan tugas, lalu ingat mau mengecek satu hal di YouTube. Tiga video kemudian tugasnya masih menunggu.",
    "File bernama final, final2, final_fix, final_beneran. Pada akhirnya dosen menerima file yang salah.",
    "Jangan hapus database karena emosi. Database tidak salah, mungkin kamu yang belum membuat backup.",
    "Ctrl + S adalah bentuk kasih sayang paling sederhana kepada diri sendiri yang sedang mengerjakan tugas.",
    "Kalau aplikasi tidak jalan, cek error-nya dulu. Jangan langsung menyalahkan laptop, Wi-Fi, cuaca, dan nasib.",
    "Tugas yang dikerjakan dari jauh-jauh hari rasanya damai. Tugas yang dikerjakan satu jam sebelum deadline rasanya seperti film aksi.",
    "Dosen meminta penjelasan kode. Mendadak aku lupa bahwa kode itu aku sendiri yang mengetiknya kemarin malam.",
    "Belajar Laravel itu seru. Hari ini berhasil membuat satu halaman, besok malah berdebat dengan route.",
    "Kalau website sudah cantik tetapi tombolnya tidak bisa diklik, itu bukan aplikasi interaktif. Itu pajangan digital.",
    "Jangan cuma menyalin kode. Nanti saat ditanya dosen, mulutmu ikut menampilkan error 404.",
    "Laptop nge-lag saat presentasi. Aku tersenyum tenang di luar, tetapi di dalam sedang rapat darurat.",
    "Kalau tugasmu terasa sulit, pecah jadi bagian kecil. Jangan dipecah jadi curhatan 30 slide di grup teman.",
    "Belum tentu yang paling cepat mengumpulkan tugas paling paham. Yang penting kerjakan dengan benar dan pahami prosesnya.",
    "Satu bug berhasil diperbaiki. Aku merasa seperti ilmuwan menemukan planet baru, padahal cuma salah nama variabel.",

    "Awal bulan: 'Aku akan hemat.' Tengah bulan: 'Kenapa saldo tinggal segini?' Akhir bulan: 'Ada yang mau traktir?'",
    "Uang jajan itu seperti mantan: datang sebentar, lalu pergi tanpa penjelasan.",
    "Masuk minimarket niatnya beli air mineral. Keluar membawa camilan dan pertanyaan, 'Tadi aku mau beli apa, ya?'",
    "Makan enak itu menyenangkan. Melihat harga makan enak lalu memilih nasi telur itu juga sebuah keputusan finansial.",
    "Mahasiswa bisa menghitung IPK sampai tiga angka di belakang koma, tetapi menghitung sisa uang sampai akhir bulan lebih menegangkan.",
    "Promo gratis ongkir memang menggoda, tetapi barang yang tidak dibutuhkan tetap saja mengurangi saldo.",
    "Dompetku bukan kosong, dia cuma sedang menerapkan gaya hidup minimalis.",
    "Ketika teman bertanya mau makan apa, jawabanku tergantung harga, bukan hanya selera.",
    "Bawa bekal ke kampus bukan berarti pelit. Itu namanya strategi bertahan hidup dengan anggaran terbatas.",
    "Kalau uang bisa berkembang biak seperti tugas kuliah, mungkin aku sudah jadi investor sejak semester satu.",

    "Niat tidur 15 menit sebelum belajar, bangun-bangun matahari sudah berubah jadwal.",
    "Alarm berbunyi lima kali. Aku bukan bangun, aku cuma membangun hubungan jangka panjang dengan tombol snooze.",
    "Sudah mandi, sudah rapi, sudah siap berangkat. Tiba-tiba hujan turun seperti tahu aku punya jadwal kuliah.",
    "Mau belajar di kamar yang rapi, tetapi malah menghabiskan waktu merapikan meja selama dua jam.",
    "Buka kulkas berulang kali dengan harapan isinya berubah. Ternyata kulkas bukan aplikasi yang bisa di-refresh.",
    "Ketika seseorang bilang 'aku sebentar lagi sampai', definisi sebentarnya perlu diuji dengan alat ukur waktu.",
    "Punya banyak tab di browser bukan berarti produktif. Bisa jadi aku hanya sedang bingung dengan banyak pilihan.",
    "Aku tidak lupa tujuan awal membuka HP. Aku hanya sedang melakukan penelitian mendalam tentang video kucing.",
    "Kalau rebahan masuk mata kuliah wajib, mungkin aku sudah lulus dengan predikat sangat memuaskan.",
    "Mencari charger di kamar sendiri itu seperti bermain petak umpet dengan benda yang tidak punya kaki.",
    "Sudah menyiapkan pertanyaan untuk dosen dari rumah. Begitu diberi kesempatan bertanya, otak mendadak cuti.",
    "Pakai baju paling bagus untuk ke kampus, lalu menghabiskan enam jam duduk di kelas yang AC-nya terlalu dingin.",
    "Kadang yang paling sulit bukan mengerjakan tugas, tetapi memutuskan mau mulai dari tugas yang mana.",
    "Kalau pikiran bisa punya tombol tutup tab, aku ingin menutup semua pikiran kecuali yang mengingatkan deadline.",
    "Aku punya bakat khusus: mencari barang selama 20 menit, lalu menemukannya tepat di depan mata.",
    "Ketika dosen berkata 'bebas mau pakai metode apa', kebebasan itu mendadak terasa seperti ujian tambahan.",
    "Rencana hari ini produktif banget. Kenyataannya, aku sudah lelah hanya dengan menyusun daftar kegiatannya.",
    "Membuka lemari penuh baju dan tetap merasa tidak punya baju adalah misteri yang bahkan belum masuk kurikulum.",
    "Kadang aku butuh liburan dari liburan karena saat libur justru kepikiran tugas yang belum selesai.",
    "Semoga hari ini tugas lancar, saldo aman, dosen baik, Wi-Fi kencang, dan orang yang kamu suka minimal menyapa dulu. Aamiin. 🤲",

    "Kalau hari ini berantakan, tidak apa-apa. Besok coba lagi. Kamu manusia, bukan mesin pencetak prestasi.",
    "Jangan membandingkan hidupmu dengan teman yang kelihatannya sudah punya semuanya. Kamu juga sedang berjalan dengan waktumu sendiri.",
    "Pelan-pelan saja. Tidak harus langsung jago, langsung kaya, langsung lulus, dan langsung menemukan jodoh satu paket.",
    "Kalau capek, istirahat dulu. Dunia tidak akan runtuh hanya karena kamu tidur cukup malam ini.",
    "Satu nilai jelek tidak membuatmu gagal sebagai manusia. Evaluasi, belajar lagi, lalu lanjutkan perjalananmu.",
    "Tidak semua rencana harus berjalan sempurna. Kadang jalan memutar justru mengajarkan hal yang tidak kita dapatkan dari jalan lurus.",
    "Kamu sudah bertahan melewati banyak hari yang dulu terasa sulit. Beri dirimu sedikit apresiasi, ya.",
    "Jangan takut bertanya atau minta bantuan. Bahkan orang yang terlihat pintar pun pernah memulai dari tidak tahu.",
    "Semoga urusan kuliahmu dimudahkan, rezekimu dilancarkan, tugasmu selesai, dan tidurmu tidak ditemani mimpi dikejar deadline.",
    "Ingat, kamu kuliah untuk belajar dan berkembang, bukan untuk membuktikan bahwa kamu tidak pernah melakukan kesalahan.",
    "Hari ini mungkin belum produktif seperti yang kamu harapkan. Tidak apa-apa, coba mulai lagi dengan satu langkah kecil.",
    "Semoga nilai bagus datang dari usaha yang baik, bukan dari keberuntungan membaca satu halaman yang kebetulan keluar di ujian.",
    "Jangan lupa mengabari keluarga, makan dengan cukup, minum air, dan istirahat. Ada banyak hal penting selain deadline.",
    "Kalau hari ini kamu hanya mampu menyelesaikan satu hal, hargai itu. Besok masih ada kesempatan untuk melanjutkan.",
    "Ayo, mahasiswa! Kerjakan tugasnya, jaga kesehatan, simpan file, dan kalau naksir seseorang, jangan lupa tetap punya kehidupan sendiri. 💚"
];

let pesanTerakhir = -1;

function gantiPesan() {
    const elemenPesan = document.getElementById("pesan");

    if (!elemenPesan || motivasi.length === 0) return;

    let nomor;

    do {
        nomor = Math.floor(Math.random() * motivasi.length);
    } while (motivasi.length > 1 && nomor === pesanTerakhir);

    pesanTerakhir = nomor;
    elemenPesan.textContent = motivasi[nomor];
}

gantiPesan();
</script>

</body>
</html>
