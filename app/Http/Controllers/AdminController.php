<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch conferences and users
        $conferences = Conference::all();
        $users = User::all();

        // Return the admin dashboard view
        return view('admin.dashboard', compact('conferences', 'users'));
    }
}
