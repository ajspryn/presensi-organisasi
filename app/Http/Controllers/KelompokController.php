<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Laravolt\Avatar\Facade as Avatar;
use Ramsey\Uuid\Uuid;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return request('kode');
        return view('kelompok.index', [
            'organisasi' => Organisasi::with('kelompok')->where('uuid', request('kode'))->get()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return request('id');
        return view('kelompok.create', [
            'organisasi' => Organisasi::with('kelompok')->where('uuid', request('kode'))->get()->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organisasi_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'logo' => 'nullable',
        ]);
        $input = $request->all();
        $input['uuid'] = Uuid::uuid4();
        if ($request->file('logo')) {
            $input['logo'] = $request->file('logo')->store('logo-kelompok');
        } else {
            $avatar = 'logo-kelompok/logo-' . $input['uuid'] . '.png';
            Avatar::create($input['nama'])->save(storage_path(path: 'app/public/logo-kelompok/logo-' . $input['uuid'] . '.png'));
            $input['logo'] = $avatar;
        }
        Kelompok::create($input);
        return redirect()->back()->with('success', 'Kelompok Berhasil Ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
