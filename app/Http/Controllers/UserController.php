<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::all();

    return view('admin.users.index', compact('users'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed',
      'role' => 'required|in:admin,customer',
    ]);

    $data['password'] = Hash::make($data['password']);
    User::create($data);

    return redirect('/admin/users')->with('success', 'User created successfully!');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $user = User::findOrFail($id);

    $data = $request->validate([
      'name' => 'required|string|max:255',
      'email' => [
        'required',
        'email',
        'max:255',
        Rule::unique('users')->ignore($user->id),
      ],
      'role' => 'required|in:admin,customer',
      'password' => 'nullable|string|min:8|confirmed',
    ]);

    if (!empty($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    } else {
      unset($data['password']); // prevent password from being null
    }

    $user->update($data);

    return redirect('/admin/users')->with('success', 'User updated successfully!');
  }
}
