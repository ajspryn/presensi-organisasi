<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Kelompok;
use App\Models\Organisasi;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravolt\Avatar\Facade as Avatar;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'organisasi_uuid' => ['required', 'exists:organisasis,uuid'],
            'kelompok_uuid' => ['required', 'exists:kelompoks,uuid'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $avatar = 'avatar/avatar-' . $data['username'] . '.png';
        if (isset($data['avatar'])) {
            $avatar = $data['avatar']->store('avatar');
        } else {
            Avatar::create($data['name'])->save(storage_path('app/public/avatar/avatar-' . $data['username'] . '.png'));
        }
        $organisasi_id = Organisasi::where('uuid', $data['organisasi_uuid'])->get()->first();
        $kelompok_id = Kelompok::where('uuid', $data['kelompok_uuid'])->get()->first();

        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $avatar,
        ]);

        $anggota = Anggota::create([
            'user_id' => $user->id,
            'kelompok_id' => $kelompok_id->id,
            'organisasi_id' => $organisasi_id->id,
        ]);

        return $user;
    }
}
