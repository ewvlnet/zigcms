<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;


class PermissionController extends Controller
{
    public $perPage = 20;

    public function __construct()
    {
        $this->middleware('can:permissions', ['only' => ['index']]);
        $this->middleware('can:permissions_create', ['only' => ['create']]);
        $this->middleware('can:permissions_update', ['only' => ['edit']]);
        $this->middleware('can:permissions_read', ['only' => ['show']]);
        $this->middleware('can:permissions_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::query()->orderBy('name', 'ASC')->paginate($this->perPage);
        return view('profile.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $data = $request->all();
        Permission::create($data);

        return redirect()->route('profile.permissions.index')->withSuccess(__('Content created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('profile.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $data = $request->all();
        $permission->update($data);

        return redirect()->route('profile.permissions.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('profile.permissions.index')->withSuccess(__('Content deleted successfully'));
    }
}
