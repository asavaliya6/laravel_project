<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function getData(Request $request)
    {
        $users = User::select(['id', 'name', 'email', 'created_at']);

        return response()->json([
            'data' => $users->get()
        ]);
    }
}
