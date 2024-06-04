<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white font-bold px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table class="table-auto w-full mt-5">
        <thead>
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Apellido</th>
                <th class="px-4 py-2">Correo</th>
                <th class="px-4 py-2">Teléfono</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->nombre }}</td>
                    <td class="border px-4 py-2">{{ $user->apellido }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->telefono }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $user->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                        <button wire:click="delete({{ $user->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white font-bold px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if ($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

    <table class="table-auto w-full mt-5">
        <thead>
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Apellido</th>
                <th class="px-4 py-2">Correo</th>
                <th class="px-4 py-2">Teléfono</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->nombre }}</td>
                    <td class="border px-4 py-2">{{ $user->apellido }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->telefono }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $user->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                        <button wire:click="delete({{ $user->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
