<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('role.index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create', [
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        // membuat role baru
        $role = Role::create([
            'name' => $request->input('name'),
        ]);

        // menyimpan permission untuk role baru
        $permissions = $request->input('permissions');
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate([
                'name' => $permissionName,
            ]);
            $role->givePermissionTo($permission);
        }

        // redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect('/role')->with('success', 'Role permissions created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions()->pluck('name')->toArray();
        return view('role.edit', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $permissions = $request->input('permissions');

        $role->syncPermissions($permissions);

        return redirect('/role')->with('success', 'Role permissions updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach(); // menghapus permission yang terhubung dengan role
        $role->delete(); // menghapus role

        return redirect('/role')->with('success', 'Role berhasil dihapus!');
    }
}
