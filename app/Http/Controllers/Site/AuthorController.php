<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;

class AuthorController extends Controller
{
    public function show($slug)
    {
        $user = User::where('slug', $slug)->where('status', 'A')->with(['files'])->first();
        return view('site.author', compact('user'));
    }
}
