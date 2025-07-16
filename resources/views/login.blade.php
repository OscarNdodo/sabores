<!DOCTYPE html>
<html lang="pt-MZ" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acesse sua conta - Sabores Moçambique">
    <title>Login - Sabores Moçambique</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/ico.png') }}" type="image/png">

    <style>
        :root {
            --primary: #e53e3e;
            --primary-light: #feb2b2;
            --gray-100: #f7fafc;
            --gray-200: #edf2f7;
            --gray-600: #4a5568;
            --gray-800: #2d3748;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--gray-100);
            color: var(--gray-800);
            line-height: 1.5;
        }

        .container {
            width: 100%;
            max-width: 28rem;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #c53030;
        }

        .input-field {
            border: 1px solid var(--gray-200);
            border-radius: 0.375rem;
            padding: 0.75rem 1rem;
            width: 100%;
            transition: border-color 0.2s;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .link-primary {
            color: var(--primary);
            font-weight: 500;
        }

        .link-primary:hover {
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--gray-600);
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid var(--gray-200);
        }

        .divider::before {
            margin-right: 1rem;
        }

        .divider::after {
            margin-left: 1rem;
        }
    </style>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center p-4 bg-gray-100">
    <div class="container max-w-md w-full mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-2"><a href="/">🌶️Sabores</a></h1>
            <p class="text-gray-600">Acesse sua conta para continuar</p>
        </div>

        <div class="card p-6 sm:p-8">
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" class="input-field" placeholder="seu@email.com"
                        required>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <a href="#" class="text-sm link-primary">Esqueceu?</a>
                    </div>
                    <input type="password" id="password" name="password" class="input-field" placeholder="••••••••"
                        required>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember"
                        class="rounded text-primary focus:ring-primary">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Lembrar de mim</label>
                </div>

                <button type="submit" class="w-full btn-primary">
                    Entrar
                </button>

                <div class="divider text-sm">ou</div>

                <button type="button"
                    class="w-full flex items-center justify-center space-x-2 border rounded-md py-3 px-4 text-sm font-medium transition hover:bg-gray-50 bg-white "
                    style="background: linear-gradient(90deg, #fff 70%, #f7fafc 100%);">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" width="18"
                        height="18" class="inline-block align-middle mr-2">
                    <span class="font-semibold text-gray-700">Continuar com <span style="color:#4285F4">G</span><span
                            style="color:#EA4335">o</span><span style="color:#FBBC05">o</span><span
                            style="color:#4285F4">g</span><span style="color:#34A853">l</span><span
                            style="color:#EA4335">e</span></span>
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">Não tem uma conta? <a href="https://wa.me/258845512288"
                        class="link-primary">Contacte-nos</a></p>
            </div>
        </div>

        <div class="mt-8 text-center text-sm text-gray-500">
            <p>© 2023 Sabores Moçambique. Todos direitos reservados.</p>
        </div>
    </div>
</body>

</html>
