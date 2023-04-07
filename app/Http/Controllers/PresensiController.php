<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Presensi;
use App\Models\AgendaEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('presensi.index');
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
        $agenda = AgendaEvent::where('uuid', $request->scan_result)->get()->first();
        if (!$agenda) {
            return redirect()->back()->with('errors', 'Agenda Tidak tersedia');
        }
        $cek_presensi = Presensi::where('agenda_event_id', $agenda->id)->where('user_id', Auth::user()->id)->get();
        $jam_sekarang = time();
        $jam_berakhir = strtotime($agenda->jam_berakhir);
        if ($jam_sekarang > $jam_berakhir) {
            return redirect()->back()->with('errors', 'Kegiatan Agenda Telah Berakhir');
        }
        if ($cek_presensi->count() > 0) {
            return redirect('/agenda?agenda=' . $agenda->uuid)->with('errors', 'Anda Telah Presensi');
        }
        Presensi::create([
            'agenda_event_id' => $agenda->id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/agenda?agenda=' . $agenda->uuid)->with('success', 'Anda Berhasil Presensi');
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
