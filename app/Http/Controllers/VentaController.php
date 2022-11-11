<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $ventas = Venta::where('nro_venta', 'LIKE', $filter . '%')
            ->orwhere('fecha', 'LIKE', $filter . '%')
            ->paginate(10);
        return view('admin.venta.index', compact('ventas', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $venta = new Venta();
        return view('admin.venta.create', compact('venta', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $venta = new Venta();

        return view('admin.venta.show', compact('venta', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = new Venta();
        return view('admin.venta.edit', compact('venta'));
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
        return redirect()->route('ventas');
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
            $venta = Venta::findOrFail($id);

            $venta->delete();
            return redirect()->route('ventas')->with('success', 'Venta eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('ventas')->with('error', $th->getMessage());
        }
    }
}
