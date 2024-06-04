<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreateUser as LivewireCreateUser;
use App\Livewire\DeleteUser as LivewireDeleteUser;
use App\Livewire\EditUser as LivewireEditUser;

Route::get('/users/create', LivewireCreateUser::class)->name('users.create');
Route::get('/users/{user}/edit', LivewireEditUser::class)->name('users.edit');
Route::get('/users/{user}/delete', LivewireDeleteUser::class)->name('users.delete');

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
