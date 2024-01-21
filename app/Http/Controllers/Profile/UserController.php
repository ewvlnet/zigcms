<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $perPage = 12;

    public function __construct()
    {
        $this->middleware('can:users', ['only' => ['index']]);
        $this->middleware('can:users_create', ['only' => ['create']]);
        $this->middleware('can:users_update', ['only' => ['edit']]);
        $this->middleware('can:users_read', ['only' => ['show']]);
        $this->middleware('can:users_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->with(['profiles'])->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('profile.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profiles = Profile::query()->orderBy('name', 'ASC')->get();
        return view('profile.user.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $newUser = User::create($data);
        $newUser->profiles()->attach($data['profile_id']);

        return redirect()->route('profile.users.index')->withSuccess(__('Content created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $profiles = Profile::query()->orderBy('name', 'ASC')->get();
        return view('profile.user.edit', compact('user', 'profiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        $data['password'] = (isset($data['password']) && $data['password'] != '') ? bcrypt($data['password']) : $user->password;
        $user->update($data);
        $user->profiles()->sync($data['profile_id']);

        return redirect()->route('profile.users.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Change status form specified resource.
     */
    public function publish(User $user)
    {
        $user->status = ($user->status == 'A') ? 'B' : 'A';
        $user->save();

        return redirect()->route('profile.users.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('profile.users.index')->withSuccess(__('Content deleted successfully'));
    }

}
