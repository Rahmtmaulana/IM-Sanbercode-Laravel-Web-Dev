<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class updateProfile extends Controller
{
    public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'age' => 'nullable|integer',
        'biodata' => 'nullable|string'
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'biodata' => $request->biodata,
        'updated_at' => now()
    ];

    DB::table('users')
        ->where('id', session('user')->id)
        ->update($data);

    $user = DB::table('users')
        ->where('id', session('user')->id)
        ->first();

    Session::put('user', $user);

    return back()->with('success', 'Profile berhasil diupdate!');
}
}
