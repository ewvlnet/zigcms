<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Permission;
use App\Models\Profile;


class ProfileController extends Controller
{
    public $perPage = 20;

    public function __construct()
    {
        $this->middleware('can:profiles', ['only' => ['index']]);
        $this->middleware('can:profiles_create', ['only' => ['create']]);
        $this->middleware('can:profiles_update', ['only' => ['edit']]);
        $this->middleware('can:profiles_read', ['only' => ['show']]);
        $this->middleware('can:profiles_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::query()->orderBy('id', 'ASC')->paginate($this->perPage);
        return view('profile.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::query()->orderBy('name', 'ASC')->get();
        return view('profile.profile.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        $data = $request->all();
        $newProfile = Profile::create($data);
        $newProfile->permissions()->attach($data['permissions']);

        return redirect()->route('profile.profiles.index')->withSuccess(__('Content created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $permissions = Permission::query()->orderBy('name', 'ASC')->get();
        return view('profile.profile.edit', compact('profile', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $data = $request->all();
        $profile->update($data);
        $profile->permissions()->sync($data['permissions']);

        return redirect()->route('profile.profiles.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profile.profiles.index')->withSuccess(__('Content deleted successfully'));
    }
}
