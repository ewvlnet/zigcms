<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserMyDataController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('profile.user.mydata', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        $data['password'] = (isset($data['password']) && $data['password'] != '') ? bcrypt($data['password']) : $user->password;
        $user->update($data);

        return redirect()->route('profile.mydata.edit', auth()->user())->withSuccess(__('Content successfully changed'));
    }
}
