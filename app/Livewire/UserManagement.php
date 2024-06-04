<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Component
{
    public $users, $nombre, $apellido, $email, $telefono, $password, $user_id;
    public $isOpen = 0;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.user-management');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->nombre = '';
        $this->apellido = '';
        $this->email = '';
        $this->telefono = '';
        $this->password = '';
        $this->user_id = '';
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'password' => 'required'
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'password' => Hash::make($this->password)
        ]);

        session()->flash('message',
            $this->user_id ? 'Usuario actualizado correctamente.' : 'Usuario creado correctamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->nombre = $user->nombre;
        $this->apellido = $user->apellido;
        $this->email = $user->email;
        $this->telefono = $user->telefono;
        $this->password = '';

        $this->openModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Usuario eliminado correctamente.');
    }
}
