<?php

use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GigController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Resource Routes:
// -----------------------
// index => Show all Gigs
// show => Show a single Gig
// Create => Show form to create new Gig
// Store => Store new Gig
// Edit => Show form to edit a gig
// Update => Update a gig
// Destroy => Delete a gig


// All Gigs
Route::get('/', [GigController::class, 'index']);

// Show Create a Gig
Route::get('/gigs/create', [GigController::class, 'create'])->middleware('auth');

// Store The Gig Data (C)
Route::post('/gigs', [GigController::class, 'store']);

// Manage a Gig (R)
Route::get('/gigs/manage', [GigController::class, 'manage'])->middleware('auth');

// Show Edit a Gig
Route::get('/gigs/{gig}/edit', [GigController::class, 'edit'])->middleware('auth');

// Update The Gig (U)
Route::put('/gigs/{gig}', [GigController::class, 'update']);

// Delete a Gig (D)
Route::delete('/gigs/{gig}', [GigController::class, 'destroy']);

// Fetching only one Gig
Route::get('/gigs/{gig}', [GigController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Log User In
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Auth User
Route::post('/user', [UserController::class, 'authenticate']);




// Route::get('/hello', function() {
//     return response('<h1>Hello World</h1>')
//     ->header('Content-Type', 'text/plain')
//     ->header('Mo', 'Hi')
//     ;
// });

// Route::get('/posts', function() {
//     return response('Hello To Posts');
// });

// Route::get('/posts/{id}', function($id) {
//     ddd($id);
//     return response('Post No. ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     return 'Your name is ' . $request->name . ' and your city is ' . $request->city;
// });