<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GigController extends Controller
{
    // Get and show all gigs
    public function index() {
        return view('gigs.index', [
            'empty_message' => 'Oops, There is no Gigs yet',
            'gigs' => Gig::latest()->filter(request(['tag', 'search']))->simplePaginate(4)
        ]);
    }

    // Show single gig
    // Id Should Match The Parameter $gig
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
        // dd($request->file('logo'));
        // Validate The Data Before Going to Database
        $fieldsValidate = $request->validate([
            'company' => ['required', Rule::unique('gigs', 'company')],
            'email' => ['required', 'email'],
            'title' => 'required',
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')) {
            $fieldsValidate['logo'] = $request->file('logo')->store('logos', 'public');
        }
        // Adding the owner of the Gig
        $fieldsValidate['user_id'] = auth()->user()->id;

        // Push Data To Database with the variable we validate the data on it
        Gig::create($fieldsValidate);

        return redirect('/')->with('message', 'Gig Created Successfully!');
    }

    // Show Edit a Gig
    // Id Should Match The Parameter $gig
    public function edit(Gig $gig) {
        // Make Sure That The User Is The Owner
        if($gig->user_id != auth()->id()) {
            abort('403', 'Unauthorized Action!!');
        }
        // dd($gig->id);
        return view('gigs.edit', [
            'gig' => $gig
        ]);
    }

    // Update The Gig Data
    public function update(Request $request, Gig $gig) {
        // Make Sure That The User Is The Owner
        if($gig->user_id != auth()->id()) {
            abort('401', 'Unauthorized Action!!');
        }

        $fieldsValidate = $request->validate([
            'company' => 'required',
            'email' => ['required', 'email'],
            'title' => 'required',
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')) {
            $fieldsValidate['logo'] = $request->file('logo')->store('logos', 'public');
        }
        // Update The Data With The Id passed
        $gig->update($fieldsValidate);

        return back()->with('message', 'Gig Updated Successfully!');
    }

    // Delete a Gig
    public function destroy(Gig $gig) {
        // Make Sure That The User Is The Owner
        if($gig->user_id != auth()->id()) {
            abort('401', 'Unauthorized Action!!');
        }

        $gig->delete();
        return redirect('/')->with('message', 'Gig Deleted Successfully!!');
    }

    // Manage Gigs
    public function manage() {
        return view('gigs.manage', [
            'gigs' => auth()->user()->gigs()->get()
        ]);
    }
}