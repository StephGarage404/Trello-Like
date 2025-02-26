<?php
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Board routes
    Route::resource('boards', BoardController::class);

    // List routes within a board
    Route::get('/boards/{board}/lists/create', [ListController::class, 'create'])->name('lists.create');
    Route::post('/boards/{board}/lists', [ListController::class, 'store'])->name('lists.store');

    // List routes for specific lists
    Route::get('/lists/{list}/edit', [ListController::class, 'edit'])->name('lists.edit');
    Route::patch('/lists/{list}', [ListController::class, 'update'])->name('lists.update');
    Route::delete('/lists/{list}', [ListController::class, 'destroy'])->name('lists.destroy');

    // Reorder lists
    Route::post('/lists/reorder', [ListController::class, 'reorder'])->name('lists.reorder');
});

require __DIR__.'/auth.php';
