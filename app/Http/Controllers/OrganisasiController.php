<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Ramsey\Uuid\Uuid;
use App\Models\Organisasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organisasi.index', [
            'organisasis' => Organisasi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama" => 'required||unique:organisasis,nama',
        ]);
        $input = $request->all();
        $input['uuid'] = Uuid::uuid4();
        $input['kode'] = Str::random(6);
        if ($request->file('logo')) {
            $input['logo'] = $request->file('logo')->store('logo-organisasi');
        } else {
            $avatar = 'logo-organisasi/logo-' . $input['kode'] . '.png';
            Avatar::create($input['nama'])->save(storage_path(path: 'app/public/logo-organisasi/logo-' . $input['kode'] . '.png'));
            $input['logo'] = $avatar;
        }
        Organisasi::create($input);
        // return redirect('/organisasi')->alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');
        return redirect('/organisasi')->with('success', 'Organisasi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $organisasi = Organisasi::with('anggota', 'event')->where('uuid', $id)->get()->first();
        $agenda = DB::table('organisasis')
            ->join('events', 'organisasis.id', '=', 'events.organisasi_id')
            ->join('agenda_events', 'events.id', '=', 'agenda_events.event_id')
            ->select('organisasis.id as organisasi_id', DB::raw('count(agenda_events.id) as jumlah_agenda'))
            ->groupBy('organisasis.id')
            ->get();
        return view('organisasi.detail', [
            'organisasi' => $organisasi,
            'jumlah_agenda' => $agenda[0]->jumlah_agenda
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('organisasi.edit', [
            'organisasi' => Organisasi::where('uuid', $id)->get()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $data = [
            "nama" => 'required',
            "alamat" => 'required',
            "deskripsi" => 'nullable',
            "logo" => 'nullable',
        ];
        $input = $request->validate($data);
        if ($request->file('logo')) {
            Storage::delete($request->logo_lama);
            $input['logo'] = $request->file('logo')->store('logo-organisasi');
        }
        Organisasi::where('id', $id)->update($input);
        $organisasi = Organisasi::where('id', $id)->get()->first();
        return redirect('/organisasi' . '/' . $organisasi->uuid)->with('success', 'Organisasi Berhasil Dedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organisasi = Organisasi::where('id', $id)->get()->first();
        Storage::delete($organisasi->logo);
        Event::deleted('organisasi_id', $id);
        Organisasi::destroy('id', $id);
        return redirect('/organisasi')->with('success', 'Organisasi Telah Di Hapus');
    }
}
