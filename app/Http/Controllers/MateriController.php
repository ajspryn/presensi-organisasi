<?php

namespace App\Http\Controllers;

use App\Models\AgendaEvent;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
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
        return view('materi.create', [
            'agenda' => AgendaEvent::where('uuid', request('agenda'))->get()->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'keterangan' => 'required',
            'file' => 'required',
        ]);
        $input = $request->all();
        $input['file'] = $request->file('file')->store('file-materi');
        Materi::create($input);
        $agenda = AgendaEvent::where('id', $input['agenda_event_id'])->get()->first();
        return redirect('/agenda?agenda=' . $agenda->uuid)->with('success', 'Materi Berhasil Ditambahkan');
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
