<div class="max-w-md mx-auto mt-20 bg-white p-2 rounded shadow">
    <div>Login</div>
    @if($errors->any())
    <div class="text-red-600">
        <ul>
            @foreach($errors->all() as $erro)
            <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form wire:submit.prevent="login">
        <label for="email">email:</label></br>
        <input type="email" name="email" id="email" wire:model="email"></br>

        <label for="password">password:</label></br>
        <input type="password" name="password" id="password" wire:model="password"></br>

        <button type="submit">Enviar</button>
    </form>
</div>
