
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | IPK Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .login-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px 16px;
        }

        .login-card {
            width: 100%;
            max-width: 460px;
            padding: 32px;
            background: var(--paper);
            border: 4px solid var(--border);
            box-shadow: 8px 8px 0 var(--shadow);
        }

        .login-icon {
            text-align: center;
            font-size: 44px;
            margin-bottom: 12px;
        }

        .login-heading {
            text-align: center;
            color: var(--green-dark);
            margin-bottom: 10px;
        }

        .login-description {
            text-align: center;
            line-height: 1.8;
            margin-bottom: 26px;
        }

        .login-field {
            margin-bottom: 20px;
        }

        .login-field label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .login-field input {
            width: 100%;
            min-width: 0;
        }

        .login-error {
            background: var(--pink);
            border: 2px solid #bd7b83;
            padding: 12px 16px;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .login-success {
            background: var(--mint);
            border: 2px solid var(--border);
            padding: 12px 16px;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            border: 3px solid var(--border);
            background: var(--green);
            color: white;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 4px 4px 0 var(--shadow);
        }

        .login-button:hover {
            background: var(--green-dark);
        }

        .login-register {
            text-align: center;
            margin-top: 24px;
            line-height: 1.8;
        }

        .login-register a {
            color: var(--green-dark);
            font-weight: bold;
        }

        .login-home {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: var(--green-dark);
        }

        .login-footer {
            text-align: center;
            margin-top: 26px;
            font-size: 11px;
        }
    </style>
</head>

<body>
<main class="login-page">
    <section class="login-card">

        <div class="login-icon">🌿</div>

        <p style="text-align:center; font-size:11px;">
            STUDENT ACADEMIC PLANNER
        </p>

        <h1 class="login-heading">Selamat Datang!</h1>

        <p class="login-description">
            Masuk ke akun IPK Planner dan lanjutkan
            perjalanan akademikmu.
        </p>

        @if ($errors->any())
            <div class="login-error">
                <strong>Login gagal.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="login-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div class="login-field">
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

            <div class="login-field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                🔑 Login
            </button>
        </form>

        <div class="login-register">
            Belum punya akun?
            <a href="/register">Daftar di sini</a>
        </div>

        <a href="/" class="login-home">
            ← Kembali ke halaman awal
        </a>

        <footer class="login-footer">
            IPK Planner · Plan your progress. Build your future. ✨
        </footer>

    </section>
</main>
</body>
</html>
