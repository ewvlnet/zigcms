<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.start', compact('user'));
    }
}
