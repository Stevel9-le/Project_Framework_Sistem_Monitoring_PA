<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
        'role'  => $request->role,
    ]);

    return redirect()->route('admin.users.index')
                     ->with('success', 'User berhasil diupdate');
}

}
