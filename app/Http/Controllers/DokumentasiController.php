<?php

namespace App\Http\Controllers;

use App\Models\AgendaEvent;
use App\Models\DokumentasiEvent;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agenda = AgendaEvent::where('uuid', request('agenda'))->get()->first();
        return view('dokumentasi.create', [
            'event_id' => $agenda->event_id,
            'agenda_event_id' => $agenda->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agenda = AgendaEvent::where('id', $request->agenda_event_id)->get()->first();
        $input = $request->all();
        if ($request->file('foto')) {
            $input['foto'] = $request->file('foto')->store('foto-dokumentasi');
        }
        DokumentasiEvent::create($input);
        return redirect('/agenda?agenda=' . $agenda->uuid)->with('success', 'Dokumentasi Brhasil Di upload');
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
