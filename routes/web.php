<?php

use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for the main home page (Dashboard)
Route::get('/', function () {
    return view('home'); // Load the home view
});

// Route for Authentication page (login/sign-up)
Route::get('/authentication', function () {
    return view('authentication'); // Load the authentication view
});

// Route for Reports page
Route::get('/reports', function () {
    return view('reports'); // Load the reports view
});

// Route for Home page with dynamic data
Route::get('/home', function () {
    $data = ['key' => 'value']; // Example dynamic data
    return view('home', $data); // Pass dynamic data to the home view
});
// Route for updating settings
Route::post('/settings-update', [SettingsController::class, 'update'])->name('settings.update');

// Route for submitting feedback
Route::post('/feedback-submit', [FeedbackController::class, 'submit'])->name('feedback.submit');


use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);