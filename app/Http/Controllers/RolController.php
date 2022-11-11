<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $roles = Rol::where('nombre', 'LIKE', $filter . '%')->paginate(10);
        return view('admin.rol.index', compact('roles', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Rol();
        return view('admin.rol.create', compact('role'));
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
            'nombre' => 'required|unique:roles',
        ]);

        $role = $request->all();
        try {
            Rol::create($role);
            return redirect()->route('roles')->with('success', 'Rol creado correctamente');
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
        $role = Rol::findOrFail($id);

        return view('admin.rol.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Rol::findOrFail($id);

        return view('admin.rol.edit', compact('role'));
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
            'nombre' => 'required',
        ]);

        if($id == 1){
            return back()->with('error', 'No puedes modificar el rol Administrador');
        }

        try {
            $role = Rol::findOrFail($id);

            $role->nombre = $request->get('nombre');
            $role->update();

            return redirect()->route('roles')->with('success', 'Rol actualizado correctamente');
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
        if($id == 1){
            return back()->with('error', 'No puedes eliminar el rol Administrador');
        }

        try {
            $role = Rol::findOrFail($id);

            $role->delete();
            return redirect()->route('roles')->with('success', 'Rol eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('roles')->with('error', $th->getMessage());
        }
    }
}
