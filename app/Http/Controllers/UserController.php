<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Organisasi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::with('anggota')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = decrypt($id);
        return view('user.detail', [
            'user' => User::with('anggota')->where('id', $id)->get()->first(),
            'roles' => Role::where('id', '!=', 1)->get(),
            'organisasis' => Organisasi::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $data = [
            "name" => 'required',
            "username" => 'required',
            "email" => 'required',
            "avatar" => 'nullable',
        ];
        $input = $request->validate($data);
        $user = User::find($id);
        $role = Role::findByName($request->roles[0]); // Ganti dengan nama peran baru yang ingin Anda berikan

        $user->syncRoles([$role]);
        // $user->assignRole($request->roles);
        // return $user;
        if ($request->file('avatar')) {
            Storage::delete($request->avatar_lama);
            $input['avatar'] = $request->file('avatar')->store('avatar');
        }
        User::where('id', $id)->update($input);
        Anggota::where('user_id', $id)->update([
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);
        return redirect()->back()->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->get()->first();
        Storage::delete($user->avatar);
        Presensi::deleted('id', $id);
        User::destroy('id', $id);
        return redirect('/user')->with('success', 'User Telah Di Hapus');
    }
}
