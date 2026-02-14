<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 space-y-6">

        {{-- Título --}}
        <div class="text-center space-y-2">
            <h2 class="text-2xl font-bold text-gray-800">
                Esqueceu sua senha?
            </h2>
            <p class="text-sm text-gray-500">
                Informe seu e-mail e enviaremos um link para redefinir sua senha.
            </p>
        </div>

        {{-- Status --}}
        @if (session('status'))
            <div class="bg-green-100 text-green-700 text-sm p-3 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        {{-- Formulário --}}
        <form wire:submit.prevent="forgot" class="space-y-5">

            {{-- Email --}}
            <div class="space-y-1">
                <label for="email" class="text-sm font-medium text-gray-700">
                    E-mail
                </label>

                <input type="email" wire:model="email" id="email"
                class="w-full p-3.5 border-2 border-gray-100 bg-gray-50 rounded-2xl focus:border-indigo-500 focus:bg-white focus:ring-0 transition-all duration-200 outline-none">

                @error('email')
                    <span class="text-sm text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Botão --}}
            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 transition duration-200 text-white font-medium py-2.5 rounded-xl shadow-md"
            >
                Enviar link de redefinição
            </button>

        </form>

        {{-- Link voltar --}}
        <div class="text-center">
            <a href="{{ route('login.auth') }}"
               class="text-sm text-indigo-600 hover:underline">
                Voltar para login
            </a>
        </div>

    </div>
</div>
