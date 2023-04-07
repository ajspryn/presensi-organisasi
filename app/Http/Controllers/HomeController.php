<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if (User::role('super admin')->get()) {
        //     return view('index', [
        //         'organisasi' => Organisasi::all(),
        //     ]);
        // } else {
        //     return view('pilih_kapal', [
        //         'ships' => Organisasi::all(),
        //     ]);
        // }
        return view('index', []);
    }
}
