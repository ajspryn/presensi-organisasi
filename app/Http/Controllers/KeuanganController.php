<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('id')) {
            $id = decrypt(request('id'));
            $keuangans = Keuangan::where('event_id', $id)->get();
        } else {
            $keuangans = Keuangan::where('organisasi_id', Auth::user()->anggota->organisasi_id)->get();
        }
        return view('keuangan.index', [
            'keuangans' => $keuangans,
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
        // return $request;
        $request->validate([
            "jenis_transaksi" => 'required',
            "keterangan" => 'required',
            "jumlah" => 'required',
        ]);
        $input = $request->all();
        $event = Event::where('id', $request->event_id)->get()->first();
        $input['organisasi_id'] = $event->organisasi_id;
        Keuangan::create($input);
        return redirect()->back()->with('success', 'Keuangan Berhasil Ditambahkan');
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
        $id = decrypt($id);
        Keuangan::destroy('id', $id);
        return redirect()->back()->with('success', 'Keuangan Berhasil Dihapus');
    }
}
