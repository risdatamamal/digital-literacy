<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
    public function show(Request $request)
    {
        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
