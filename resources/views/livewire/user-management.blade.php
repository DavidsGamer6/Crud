<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Crear Usuario</button>

            @if($isOpen)
                @include('livewire.create')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
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
    </div>
</div>
