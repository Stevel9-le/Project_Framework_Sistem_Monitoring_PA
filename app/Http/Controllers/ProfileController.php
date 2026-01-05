<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('admin.profile.edit', compact('profile'));
    }

 public function update(Request $request)
{
    $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,jfif|max:2048',
        'phone' => 'nullable|string|max:20',
        'bio'   => 'nullable|string',
    ]);

    $user = Auth::user();

    $profile = \App\Models\Profile::firstOrCreate(
        ['user_id' => $user->id]
    );

    if ($request->hasFile('photo')) {

        // hapus foto lama
        if ($profile->photo && Storage::disk('public')->exists('avatars/'.$profile->photo)) {
            Storage::disk('public')->delete('avatars/'.$profile->photo);
        }

        // nama file aman
        $filename = time().'_'.$user->id.'.'.$request->photo->getClientOriginalExtension();

        // SIMPAN FILE (INI YANG TADI TIDAK TERJADI)
        $request->photo->storeAs(
            'avatars',
            $filename,
            'public'
        );

        $profile->photo = $filename;
    }

    $profile->phone = $request->phone;
    $profile->bio   = $request->bio;
    $profile->save();

    return back()->with('success', 'Profile berhasil diperbarui');
}
}