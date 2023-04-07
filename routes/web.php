<?php

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

// All Gigs
Route::get('/', function () {
    return view('gigs', [
        'heading' => 'Latest Gigs',
        'empty_message' => 'Oops, There is no Gigs yet',
        'gigs' => Gig::all()
    ]);
});

// Fetching only one Gig
Route::get('/gig/{gig}', function(Gig $gig) {
    return view('gig', [
        'gig' => $gig
    ]);
});




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