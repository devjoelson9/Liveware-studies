<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <div class="flex justify-center mb-4">
            <div class="bg-indigo-100 p-3 rounded-full">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 12H8m8 4H8m8-8H8m12 8V6a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2h6" />
                </svg>
            </div>
        </div>

        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-2">
            Verifique seu e-mail
        </h1>

        <p class="text-gray-500 text-center mb-6 text-sm">
            Enviamos um link de verificação para o seu e-mail.
            Clique no link para ativar sua conta.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 p-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm text-center">
                ✅ Um novo link de verificação foi enviado para seu e-mail.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button
                class="w-full bg-indigo-600 hover:bg-indigo-700 transition duration-200 text-white font-medium py-2.5 rounded-lg shadow-sm">
                Reenviar e-mail
            </button>
        </form>

        <p class="text-xs text-gray-400 text-center mt-6">
            Não recebeu o e-mail? Verifique sua caixa de spam.
        </p>
    </div>
</div>
