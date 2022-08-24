<?php

use App\Http\Livewire\Auth\Forget;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Counter;
use App\Http\Livewire\Dashboard\Users\Create as UsersCreate;
use App\Http\Livewire\Dashboard\Users\Edit as UsersEdit;
use App\Http\Livewire\Dashboard\Users\Index as UsersIndex;
use App\Http\Livewire\Dashboard\Roles\Create as RolesCreate;
use App\Http\Livewire\Dashboard\Roles\Edit as RolesEdit;
use App\Http\Livewire\Dashboard\Roles\Index as RolesIndex;
use App\Http\Livewire\Dashboard\Categories\Create as CategoriesCreate;
use App\Http\Livewire\Dashboard\Categories\Edit as CategoriesEdit;
use App\Http\Livewire\Dashboard\Categories\Index as CategoriesIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware('guest')->group(function (){
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::get('forget', Forget::class)->name('forget');
});

Route::prefix('dashboard')->middleware('auth')->group(function (){
    Route::get('', Counter::class)->name('dashboard');
    Route::get('users', UsersIndex::class)->name('dashboard.users');
    Route::get('users/create', UsersCreate::class)->name('dashboard.users.create');
    Route::get('users/edit/{user}', UsersEdit::class)->name('dashboard.users.edit');

    Route::get('roles', RolesIndex::class)->name('dashboard.roles');
    Route::get('roles/create', RolesCreate::class)->name('dashboard.roles.create');
    Route::get('roles/edit/{role}', RolesEdit::class)->name('dashboard.roles.edit');

    Route::get('categories', CategoriesIndex::class)->name('dashboard.categories');
    Route::get('categories/create', CategoriesCreate::class)->name('dashboard.categories.create');
    Route::get('categories/edit/{category}', CategoriesEdit::class)->name('dashboard.categories.edit');
});
