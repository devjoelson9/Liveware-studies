<div class="flex items-center justify-center min-h-screen bg-gray-50 p-4">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">

        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Criar Conta</h2>
            <p class="text-gray-500 mt-2">Preencha os dados para começar</p>
        </div>

        @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
            <div class="flex items-center mb-1">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="font-bold text-red-800 text-sm italic">Ops! Algo deu errado:</span>
            </div>
            <ul class="list-disc list-inside text-sm text-red-700 ml-2">
                @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form wire:submit.prevent="register" class="space-y-5">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nome Completo</label>
                <input type="text" id="name" wire:model="name" placeholder="Nome"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-200 bg-gray-50 focus:bg-white">
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">E-mail</label>
                <input type="email" id="email" wire:model="email" placeholder="E-mail"
                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-200 bg-gray-50 focus:bg-white">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">
                    Senha
                </label>

                <div class="relative">
                    <input type="password" id="password" wire:model.defer="password" placeholder="••••••••" class="w-full px-4 py-2.5 pr-10 rounded-lg border border-gray-300
                   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                   outline-none transition duration-200 bg-gray-50 focus:bg-white">

                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center
                   text-gray-400 hover:text-indigo-600" aria-label="Mostrar ou ocultar senha">
                        <i id="eyeIcon" class="fa-solid fa-eye"></i>
                    </button>
                </div>
            </div>

            <button
    type="submit"
    wire:loading.attr="disabled"
    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-lg shadow-lg hover:shadow-indigo-200 transition-all duration-200 transform active:scale-95 flex items-center justify-center"
>
    {{-- Estado normal --}}
    <span wire:loading.remove wire:target="register" class="flex items-center">
        Finalizar Cadastro
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
        </svg>
    </span>

    {{-- Loading (lado a lado) --}}
    <span
        wire:loading
        wire:target="register"
        class="flex items-center gap-2"
    >
        <svg class="animate-spin h-5 w-5 text-white" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4" fill="none"/>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8v8z"/>
        </svg>
        Criando conta...
    </span>
</button>


        </form>

        <p class="text-center text-sm text-gray-600 mt-8">
            Já tem uma conta?
            <a href="{{ route('login.auth') }}"
                class="font-bold text-indigo-600 hover:text-indigo-500 underline decoration-2 underline-offset-4"
                wire:navigate>Login</a>
        </p>
    </div>

    <script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon  = document.getElementById('eyeIcon');

        if (!input || !icon) return;

        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';

        icon.classList.toggle('fa-eye', !isPassword);
        icon.classList.toggle('fa-eye-slash', isPassword);
    }
    </script>
</div>
