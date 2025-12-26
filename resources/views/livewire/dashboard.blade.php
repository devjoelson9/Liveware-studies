<div class="h-screen flex flex-col bg-gray-100">

    <x-navbar/>

    <div class="flex flex-1 overflow-hidden">

        <x-sidebar/>

        <div class="flex-1 p-6 overflow-y-auto">
            <livewire:lista-tarefas />
        </div>

    </div>

    <x-footer/>

</div>
