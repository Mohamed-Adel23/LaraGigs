<?php

use App\Http\Controllers\GigController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Gig;

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
Route::get('/gigs/create', [GigController::class, 'create']);

// Store The Gig Data
Route::post('/gigs', [GigController::class, 'store']);

// Show Edit a Gig
Route::get('/gigs/{gig}/edit', [GigController::class, 'edit']);

// Update The Gig
Route::put('/gigs/{gig}', [GigController::class, 'update']);

// Delete a Gig
Route::delete('/gigs/{gig}', [GigController::class, 'destroy']);

// Fetching only one Gig
Route::get('/gigs/{gig}', [GigController::class, 'show']);







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
