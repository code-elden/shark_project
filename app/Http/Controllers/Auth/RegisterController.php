<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'dni' => ['required', 'string', 'max:20'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
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
        try {
            $roles = Rol::where('nombre', '=', 'Usuario')->get();

            return User::create([
                'dni' => $data['dni'],
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'direccion' => $data['direccion'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'rol_id' => $roles[0]->id,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:20',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        try {
            $roles = Rol::where('nombre', '=', 'Usuario')->get();

            if (count($roles) > 0) {
                $user = $request->all();

                $user['password'] = Hash::make($request->get('password'));
                $user['rol_id'] = $roles[0]->id;

                User::create($user);
                return redirect()->route('login')->with('success', 'Usuario creado correctamente');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function createDefault()
    {
        if (count(Rol::all()) == 0) {
            Rol::create(['nombre' => 'Administrador']);
            Rol::create(['nombre' => 'Usuario']);

            return User::create([
                'dni' => 'Default',
                'nombres' => 'Default',
                'apellidos' => 'Default',
                'direccion' => 'Default',
                'telefono' => 'Default',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'rol_id' => 1,
            ]);

            return redirect()->route('/');
        }
        return back()->with('error', 'Ya tiene registros');
    }
}
