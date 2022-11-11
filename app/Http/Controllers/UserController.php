<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $users = User::join('roles as r', 'users.rol_id', '=', 'r.id')
            ->where('users.email', 'LIKE', $filter . '%')
            ->orWhere('r.nombre', 'LIKE', $filter . '%')
            ->select('users.*')
            ->orderby('r.nombre', 'ASC')
            ->paginate(10);
        return view('admin.user.index', compact('users', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Rol::all();
        return view('admin.user.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:20',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
            'rol_id' => 'required|integer',
        ]);

        $user = $request->all();

        $user['password'] = Hash::make($request->get('password'));
        try {
            User::create($user);
            return redirect()->route('users')->with('success', 'Usuario creado correctamente');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
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

            $user = $request->all();

            $user['password'] = Hash::make($request->get('password'));
            $user['rol_id'] = $roles[0]->id;

            User::create($user);
            return redirect()->route('login')->with('success', 'Usuario creado correctamente');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Rol::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required|string|max:20',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'rol_id' => 'required|integer',
        ]);

        try {
            $user = User::findOrFail($id);

            $user->dni = $request->get('dni');
            $user->nombres = $request->get('nombres');
            $user->apellidos = $request->get('apellidos');
            $user->direccion = $request->get('direccion');
            $user->telefono = $request->get('telefono');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->rol_id = $request->get('rol_id');
            $user->update();

            return redirect()->route('users')->with('success', 'Usuario actualizado correctamente');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->delete();
            return redirect()->route('users')->with('success', 'Usuario eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('users')->with('error', $th->getMessage());
        }
    }
}
