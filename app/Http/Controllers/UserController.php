<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conference;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $conferences = Conference::all();
        return view('user.index', compact('conferences', 'users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }

    public function registerForConference(Request $request, Conference $conference)
    {
        // Validate user selection
        $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure the user exists
            'conference_id' => 'required|exists:conferences,id', // Ensure the conference exists
        ]);

        // Find the user by the selected user ID
        $user = User::findOrFail($request->user_id);

        // Attach the user to the conference (many-to-many relationship)
        $conference->users()->attach($user);

        // Redirect to the user index page
        return redirect()->route('user.index')->with('success', 'You have successfully registered for the conference!');
    }

    public function showAttendees(Conference $conference)
    {
        $attendees = $conference->users;
        return view('employee.attendees', compact('attendees', 'conference'));
    }
    
}