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
            'gigs' => Gig::all()
        ]);
    }

    // Show single gig
    public function show(Gig $gig) {
        return view('gigs.show', [
            'gig' => $gig
        ]);
    }
}