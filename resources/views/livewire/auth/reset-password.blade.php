<div class="min-h-screen flex items-center justify-center bg-gradient-to-br bg-white px-4">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8 space-y-6">

        <div class="text-center space-y-2">
            <h1 class="text-2xl font-bold text-gray-800">
                Redefinir senha
            </h1>
            <p class="text-sm text-gray-500">
                Digite sua nova senha abaixo.
            </p>
        </div>

        <form wire:submit.prevent="resetPassword" class="space-y-5">
            <div>
                <label class="text-sm font-medium text-gray-700">
                    E-mail
                </label>

                <input
                    type="email"
                    wire:model="email"
                    readonly
                    class="w-full mt-1 px-4 py-2 rounded-xl border bg-gray-100"
                >

                @error('email')
                    <span class="text-sm text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">
                    Nova senha
                </label>

                <input
                    type="password"
                    wire:model="password"
                    class="w-full mt-1 px-4 py-2 rounded-xl border focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                >

                @error('password')
                    <span class="text-sm text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">
                    Confirmar senha
                </label>

                <input
                    type="password"
                    wire:model="password_confirmation"
                    class="w-full mt-1 px-4 py-2 rounded-xl border focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                >
            </div>

            <button
                type="submit"
                class="w-full py-3 rounded-2xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition duration-200 shadow-lg"
            >
                Redefinir senha
            </button>

        </form>

    </div>
</div>
