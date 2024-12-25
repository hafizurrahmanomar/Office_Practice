<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomAuthMiddleware;
use app\Http\Middleware\BdMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/public',[HomeController::class, 'publicMessage'])->name('public');
// Route::get('/private',[HomeController::class, 'privateMessage'])->name('private')->middleware(['auth']);
// Route::get('/secrete', [HomeController::class, 'restrictedMessage'])->name('secrete')->middleware('auth', 'verified');

// Route::middleware('auth')->group(function () {
//     Route::get('/private',[HomeController::class, 'privateMessage'])->name('private');
//     Route::get('/secrete', [HomeController::class, 'restrictedMessage'])->name('secrete')->middleware('verified');
// });

/// Route::middleware('auth')->group(function () default function
// Route::middleware(['auth', 'throttle:2,1'])->group(function () {
//     Route::get('/private',[HomeController::class, 'privateMessage'])->name('private');
//     Route::get('/secrete', [HomeController::class, 'restrictedMessage'])->name('secrete')->middleware('verified');
// });


///Route authenticated users only CustomAuthMiddleware class used with authentication
Route::middleware([CustomAuthMiddleware::class])->group(function () {
    Route::get('/private', [HomeController::class, 'privateMessage'])->name('private');
    Route::get('/secrete', [HomeController::class, 'restrictedMessage'])->name('secrete')->middleware('verified');
});


///Two requests per minute
Route::get('/fileDownload', [HomeController::class, 'downloadFile'])->name('fileDownload')->middleware('throttle:2,1'); //2 requests per minute

///Ten requests per day
Route::get('/pictureDownload', [HomeController::class, 'pictureDownload'])
    ->name('pictureDownload')
    ->middleware('throttle:10,1440'); // 1440 minutes in a day

///custom middleware applied to the route
    Route::get('/hafiz', [HomeController::class, 'Hafiz'])->name('hafiz')->middleware(CustomAuthMiddleware::class);
/// country middleware applied to the route
    Route::get('/country', [HomeController::class, 'country'])->name('country')->middleware(BdMiddleware::class);