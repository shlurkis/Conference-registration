<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Models\User;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = \App\Models\Conference::all();
        $users = \App\Models\User::all();
        return view('user.index', compact('conferences', 'users'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Conference::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Conference created successfully.');
    }

    public function edit(Conference $conference)
    {
        $participants = $conference->users;
    
        return view('admin.conferences.edit', compact('conference', 'participants'));
    }

    public function removeParticipant(Conference $conference, User $user)
{
    $conference->users()->detach($user->id);
    return redirect()->route('admin.conferences.edit', $conference)
                     ->with('success', 'Participant removed successfully.');
}

    public function update(Request $request, Conference $conference)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $conference->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Conference updated successfully.');
    }

    public function destroy(Conference $conference)
    {
        $conference->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Conference deleted successfully.');
    }
}