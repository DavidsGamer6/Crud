<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $nombre, $apellido, $email, $telefono, $password;
    public $users, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.user');
    }

    private function resetInputFields()
    {
        $this->nombre = '';
        $this->apellido = '';
        $this->email = '';
        $this->telefono = '';
        $this->password = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'password' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        session()->flash('message', 'Usuario creado exitosamente.');

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

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        if ($this->password) {
            $validatedData['password'] = Hash::make($this->password);
        } else {
            unset($validatedData['password']);
        }

        $user = User::find($this->user_id);
        $user->update($validatedData);

        $this->updateMode = false;

        session()->flash('message', 'Usuario actualizado exitosamente.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Usuario eliminado exitosamente.');
    }
}
