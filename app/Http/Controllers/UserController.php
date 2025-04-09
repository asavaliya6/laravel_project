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
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('d M Y h:i A');
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="' . route('users.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                    $deleteBtn = '<button data-id="' . $row->id . '" class="btn btn-sm btn-danger deleteUser">Delete</button>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action']) 
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
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('users.list')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
    }

}
