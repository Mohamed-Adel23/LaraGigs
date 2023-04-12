<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;

class GigController extends Controller
{
    // Get and show all gigs
    public function index() {
        return view('gigs.index', [
            'empty_message' => 'Oops, There is no Gigs yet',
            'gigs' => Gig::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    // Show single gig
    public function show(Gig $gig) {
        return view('gigs.show', [
            'gig' => $gig
        ]);
    }

    // Create New Gig
    public function create() {
        return view('gigs.create');
    }

    // Store The Data of The New Gig
    public function store(Request $request) {
        dd($request->all());
    }
}
