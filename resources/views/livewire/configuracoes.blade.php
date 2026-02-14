<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

    <div class="space-y-10">
        {{-- Seção 1: Informações do Perfil --}}
        <section class="bg-white shadow-sm border border-gray-100 rounded-3xl overflow-hidden">
            <div class="p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Informações Pessoais</h2>
                    <p class="text-sm text-gray-500">Atualize seu nome de exibição e endereço de e-mail.</p>
                </div>

                <form wire:submit.prevent="updateProfile" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                            <input type="text" wire:model="name" class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                            <input type="email" wire:model="email" class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-semibold transition shadow-md active:scale-95">
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </section>

        {{-- Seção 2: Segurança (Senha) --}}
        <section class="bg-white shadow-sm border border-gray-100 rounded-3xl overflow-hidden">
            <div class="p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Segurança</h2>
                    <p class="text-sm text-gray-500">Certifique-se de usar uma senha longa e segura.</p>
                </div>

                <form wire:submit.prevent="updatePassword" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nova Senha</label>
                            <input type="password" wire:model="password" class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha</label>
                            <input type="password" wire:model="password_confirmation" class="w-full p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-gray-800 hover:bg-black text-white px-6 py-2 rounded-xl font-semibold transition shadow-md active:scale-95">
                            Atualizar Senha
                        </button>
                    </div>
                </form>
            </div>
        </section>

        {{-- Seção 3: Zona de Perigo --}}
        <section class="bg-red-50 border border-red-100 rounded-3xl overflow-hidden">
            <div class="p-8 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-red-800">Excluir Conta</h2>
                    <p class="text-sm text-red-600">Uma vez excluída, todos os seus dados serão perdidos permanentemente.</p>
                </div>
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl font-medium transition">
                    Excluir
                </button>
            </div>
        </section>
    </div>
</div>
