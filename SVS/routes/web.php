<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. THE FRONT GATE (Publicly accessible)
// This shows your "welcome.blade.php" with the Fantastic 4 origin story
Route::get('/', 'PagesController@index');

// Auth Routes (Login, Register, etc.)
Auth::routes();


// 2. THE BAXTER BUILDING (Login Required)
// Everything inside this group requires the hero to be logged in
Route::middleware(['auth'])->group(function () {
    
    // Mission Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Post Archives (Stories)
    Route::resource('posts', 'PostsController');

    // Other Private Pages
    Route::get('/about', 'PagesController@about');
    Route::get('/services','PagesController@services');
    
    // Testing Route
    Route::get('/hello', function() { return '<h1>Welcome to the Laboratory, Hero.</h1>'; });
});