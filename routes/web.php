<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/////////////////////////////////////////////////////////////////////////////////////

Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations');
Route::get('/invitations/create', [InvitationController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('invitations.create');

Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');

Route::post('/invitations/create', [InvitationController::class, 'create'])->name('invitations.create');

Route::get('/invitations/rsvp-lists/{eventId}', [InvitationController::class, 'rsvpLists'])->name('invitations.rsvp');
Route::get('/invitations/{id}/attend', [InvitationController::class, 'attend'])->name('invitations.attend');
Route::put('/invitations/{id}', [InvitationController::class, 'update'])->name('invitations.update');


////////////////////////////////////////////////////////////////////////////////////


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========================================================================================================

Route::get('/event', [EventController::class, 'index'])->name('event');

Route::post('/event/create', [EventController::class, 'save'])->name('event.create');

Route::get('/event/create', function () {
    return view('event.create');
})->middleware(['auth','verified'])->name('event.create');

Route::get('/events/{id}', [EventController::class, 'show'])->name('event.show');

Route::get('/event/{id}/edit', [EventController::class, 'edit'])->middleware(['auth', 'verified'])->name('event.edit');

Route::patch('/event/{id}', [EventController::class, 'update'])->name('event.update');

Route::delete('/event/{id}', [EventController::class, 'destroy'])->middleware(['auth', 'verified'])->name('event.destroy');

Route::get('/user/{id}', function (string $id) {
    return new UserCollection(User::paginate());
});

//Route::get('/users', function () {
//    return UserResource::collection(User::all());
//});

Route::get('/users', function () {
    return UserResource::collection(User::all()->keyBy->id);
});




require __DIR__.'/auth.php';
