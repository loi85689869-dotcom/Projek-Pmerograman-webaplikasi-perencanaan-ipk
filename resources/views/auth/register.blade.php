
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .register-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px 16px;
        }

        .register-card {
            width: 100%;
            max-width: 480px;
            padding: 32px;
            background: var(--paper);
            border: 4px solid var(--border);
            box-shadow: 8px 8px 0 var(--shadow);
        }

        .register-icon {
            text-align: center;
            font-size: 44px;
            margin-bottom: 12px;
        }

        .register-heading {
            text-align: center;
            color: var(--green-dark);
            margin-bottom: 10px;
        }

        .register-description {
            text-align: center;
            line-height: 1.8;
            margin-bottom: 26px;
        }

        .register-field {
            margin-bottom: 18px;
        }

        .register-field label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .register-field input {
            width: 100%;
            min-width: 0;
        }

        .register-error {
            background: var(--pink);
            border: 2px solid #bd7b83;
            padding: 12px 16px;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .register-button {
            width: 100%;
            padding: 14px;
            border: 3px solid var(--border);
            background: var(--green);
            color: white;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 4px 4px 0 var(--shadow);
        }

        .register-button:hover {
            background: var(--green-dark);
        }

        .register-login {
            text-align: center;
            margin-top: 24px;
            line-height: 1.8;
        }

        .register-login a {
            color: var(--green-dark);
            font-weight: bold;
        }

        .register-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 11px;
        }
    </style>
</head>

<body>
<main class="register-page">
    <section class="register-card">

        <div class="register-icon">🌿</div>

        <p style="text-align:center; font-size:11px;">
            STUDENT ACADEMIC PLANNER
        </p>

        <h1 class="register-heading">Buat Akun</h1>

        <p class="register-description">
            Selamat datang di IPK Planner!
            Buat akunmu untuk mulai merencanakan perjalanan akademik.
        </p>

        @if ($errors->any())
            <div class="register-error">
                <strong>Periksa kembali data kamu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf

            <div class="register-field">
                <label for="name">Nama Lengkap</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    autocomplete="name"
                    required
                >
            </div>

            <div class="register-field">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="register-field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Buat password"
                    autocomplete="new-password"
                    required
                >
            </div>

            <div class="register-field">
                <label for="password_confirmation">
                    Konfirmasi Password
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    required
                >
            </div>

            <button type="submit" class="register-button">
                🌱 Buat Akun
            </button>
        </form>

        <div class="register-login">
            Sudah punya akun?
            <a href="/login">Login di sini</a>
        </div>

        <footer class="register-footer">
            IPK Planner · Plan your progress. Build your future. ✨
        </footer>

    </section>
</main>
</body>
</html>
