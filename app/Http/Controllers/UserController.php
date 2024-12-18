<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Other CRUD methods for users can be added here
}
