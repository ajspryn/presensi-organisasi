<?php

namespace App\Http\Controllers;

use App\Models\AgendaEvent;
use App\Models\Event;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uuid = request('event');
        return view('event.index', [
            'event' => Event::with('agenda')->where('uuid', $uuid)->get()->first(),
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
            "nama" => "required",
            "tgl_event" => "required",
            "alamat" => "required",
            "organisasi_id" => "required",
        ]);
        $input = $request->all();
        if ($request->file('flayer')) {
            $input['flayer'] = $request->file('flayer')->store('flayer');
        }
        $input['uuid'] = Uuid::uuid4();
        Event::create($input);
        $organisasi = Organisasi::where('id', $input['organisasi_id'])->get()->first();
        return redirect('/organisasi' . '/' . $organisasi->uuid)->with('success', 'Event Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('event.create', [
            'organisasi' => Organisasi::where('uuid', $id)->get()->first(),
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
