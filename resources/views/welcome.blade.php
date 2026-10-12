
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPK Planner - Rencanakan Masa Depanmu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .welcome-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .welcome-card {
            width: 100%;
            max-width: 850px;
            background: var(--paper);
            border: 4px solid var(--border);
            padding: 40px;
            text-align: center;
            box-shadow: 10px 10px 0 var(--shadow);
        }

        .welcome-icon {
            font-size: 56px;
            margin-bottom: 18px;
        }

        .welcome-label {
            display: inline-block;
            padding: 8px 12px;
            margin-bottom: 18px;
            background: var(--mint);
            border: 2px solid var(--border);
            font-size: 12px;
        }

        .welcome-title {
            color: var(--green-dark);
            font-size: clamp(24px, 5vw, 40px);
            line-height: 1.5;
            margin: 10px 0 18px;
        }

        .welcome-description {
            max-width: 570px;
            margin: 0 auto 28px;
            line-height: 1.9;
        }

        .welcome-features {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin: 28px 0;
            text-align: left;
        }

        .welcome-feature {
            padding: 16px;
            background: var(--mint);
            border: 2px solid var(--border);
        }

        .welcome-feature:nth-child(2) {
            background: var(--yellow);
        }

        .welcome-feature:nth-child(3) {
            background: var(--pink);
        }

        .welcome-feature strong {
            display: block;
            margin-bottom: 8px;
            color: var(--green-dark);
        }

        .welcome-feature p {
            font-size: 13px;
            line-height: 1.7;
            margin: 0;
        }

        .welcome-actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 28px;
        }

        .welcome-button {
            display: inline-block;
            padding: 14px 20px;
            border: 3px solid var(--border);
            background: var(--green);
            color: white;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 4px 4px 0 var(--shadow);
        }

        .welcome-button:hover {
            background: var(--green-dark);
            color: white;
        }

        .welcome-button.secondary {
            background: var(--paper);
            color: var(--green-dark);
        }

        .welcome-footer {
            margin-top: 34px;
            font-size: 12px;
            color: var(--text);
        }

        @media (max-width: 600px) {
            .welcome-card {
                padding: 24px 16px;
            }

            .welcome-features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
<main class="welcome-page">
    <section class="welcome-card">

        <div class="welcome-icon">🌿</div>

        <span class="welcome-label">
            STUDENT ACADEMIC PLANNER
        </span>

        <h1 class="welcome-title">IPK Planner</h1>

        <p class="welcome-description">
            Rencanakan perjalanan akademikmu dengan lebih terarah.
            Kelola semester, hitung IPK, tentukan target, dan atur
            jadwal belajar dalam satu tempat.
        </p>

        <div class="welcome-features">
            <div class="welcome-feature">
                <strong>📚 Data Akademik</strong>
                <p>Kelola semester, mata kuliah, dan nilai perkuliahan.</p>
            </div>

            <div class="welcome-feature">
                <strong>🎯 Target IPK</strong>
                <p>Hitung kebutuhan nilai untuk mencapai target IPK.</p>
            </div>

            <div class="welcome-feature">
                <strong>🗓️ Jadwal Belajar</strong>
                <p>Susun waktu belajar dan pantau kegiatanmu.</p>
            </div>
        </div>

        <div class="welcome-actions">
            <a href="/login" class="welcome-button">
                Login →
            </a>

            <a href="/register" class="welcome-button secondary">
                Buat Akun
            </a>
        </div>

        <footer class="welcome-footer">
            IPK Planner · Plan your progress. Build your future. ✨
        </footer>

    </section>
</main>
</body>
</html>
