<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow">
        <h1 class="text-xl font-bold mb-4">Verifique seu e-mail</h1>

        <p class="text-gray-600 mb-4">
            Enviamos um link de verificação para o seu e-mail.
        </p>

        @if (session('status') == 'verification-link-sent')
            <p class="text-green-600 mb-4">
                Um novo link foi enviado!
            </p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="w-full bg-indigo-600 text-white py-2 rounded">
                Reenviar e-mail
            </button>
        </form>
    </div>
</body>
</html>
