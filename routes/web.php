<?php

use App\Http\Controllers\TeamController;
use App\Http\Livewire\Admin\Person\Edit as AdminPersonEdit;
use App\Http\Livewire\Admin\Person\Index as AdminPersonIndex;
use App\Http\Livewire\Person\Index as PersonIndex;
use App\Http\Livewire\Person\Show as PersonShow;
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

Route::redirect('/', '/team');

Route::get('/team', PersonIndex::class)->name('person.index');
Route::get('/team/{slug}', PersonShow::class)->name('person.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::redirect('/dashboard', '/dashboard/team')->name('dashboard');

    Route::get('/dashboard/team', AdminPersonIndex::class)->name('admin.team.index');
    Route::get('/dashboard/team/{person}/edit', AdminPersonEdit::class)->name('admin.team.edit');

});
