<?php

namespace App\Http\Controllers;

use App\Models\AgendaEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AgendaEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agenda_uuid = request('agenda');
        return view('agenda.index', [
            'agenda' => AgendaEvent::where('uuid', $agenda_uuid)->get()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event_uuid = request('event');
        return view('agenda.create', [
            'event' => Event::where('uuid', $event_uuid)->get()->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            "nama" => 'required',
            "tanggal" => 'required',
            "jam_mulai" => 'required',
            "jam_berakhir" => 'required',
            "event_id" => 'required',
        ]);
        $input = $request->all();
        $input['uuid'] = Uuid::uuid4();
        AgendaEvent::create($input);
        $event = Event::where('id', $input['event_id'])->get()->first();
        return redirect('/event?event=' . $event->uuid)->with('success', 'Agenda Berhasil Dibuat');
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
