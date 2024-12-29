<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list-roles')->only('index');
        $this->middleware('permission:create-roles')->only(['create', 'store']);
        $this->middleware('permission:edit-roles')->only(['edit', 'update']);
        $this->middleware('permission:delete-roles')->only('destroy');
    }

    public function index($lang)
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    public function create($lang)
    {
        $permissions = Permission::all()->groupBy('group');
        return view('roles.create', compact('permissions'));
    }

    public function store($lang, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index', $lang)->with('success', __('Role created successfully!'));
    }

    public function edit($lang, Role $role)
    {
        $permissions = Permission::all()->groupBy('group');
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update($lang, Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index', $lang)->with('success', __('Role updated successfully!'));
    }

    public function destroy($lang, Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index', $lang)->with('success', __('Role deleted successfully!'));
    }
}
