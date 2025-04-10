<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $userQuery = User::select('*');

            $isActive = $request->input('isActive');
            if ($isActive === 'active') {
                $userQuery->where('status', 1); 
            } elseif ($isActive === 'inactive') {
                $userQuery->where('status', 0); 
            }

            return DataTables::of($userQuery)
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('d M Y h:i A');
                })
                ->make(true); 
        }

        return view('users.list');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required|boolean',
        ]);

        $user->update($request->only('name', 'email', 'status'));

        return redirect()->route('users.list')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.'
        ]);
    }

}
