<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'required',
            'cantidad' => 'required|integer|min:1',
        ]);

        if ($id != $request->get('producto_id')) {
            return back()->with('error', 'La información del producto no coincide');
        }

        $carrito = $request->all();
        $producto = Producto::findOrFail($carrito['producto_id']);

        $user_id = Auth::user()->id;

        $carritos = Carrito::where('user_id', '=', $user_id)
            ->where('producto_id', '=', $id)
            ->get();

        $carrito_existente = null;
        if (count($carritos) > 0) {
            $carrito_existente = $carritos[0];
            $producto->stock += $carrito_existente->cantidad;
        }

        if ($producto->stock < $carrito['cantidad']) {
            return back()->with('error', 'No hay stock suficiente.');
        }

        try {
            if ($carrito_existente == null) {
                $carrito['user_id'] = $user_id;
                $carrito['precio'] = $producto->precio;
                Carrito::create($carrito);
            } else {
                $carrito_existente->cantidad = $carrito['cantidad'];
                $carrito_existente->precio = $producto->precio;
                $carrito_existente->update();
            }

            $producto->stock -= $carrito['cantidad'];
            $producto->update();

            return redirect()->route('catalogo')->with('success', 'Producto agregado al carrito de compras');
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
    public function show()
    {
        $user_id = Auth::user()->id;

        $carritos = Carrito::where('user_id', '=', $user_id)->get();

        $total = 0;
        foreach ($carritos as $item) {
            $total += $item->precio * $item->cantidad;
        }

        return view('client.carrito', compact('carritos', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $carrito = Carrito::findOrFail($id);

            $carrito->producto->stock += $carrito->cantidad;
            $carrito->producto->update();

            $carrito->delete();
            return redirect()->route('ver-carrito')->with('success', 'Producto eliminado del carrito de compras');
        } catch (\Throwable $th) {
            return redirect()->route('ver-carrito')->with('error', $th->getMessage());
        }
    }

    public function comprar()
    {
        try {
            $user_id = Auth::user()->id;

            $carritos = Carrito::where('user_id', '=', $user_id)->get();

            $total = 0;
            $venta = [];
            $venta['nro_venta'] = date('YmdHisu');
            $venta['user_id'] = $user_id;
            $venta['fecha'] = date('Y-m-d');
            $venta['total'] = $total;

            Venta::create($venta);

            $objVenta = Venta::where('nro_venta', '=', $venta['nro_venta'])->get()[0];

            foreach ($carritos as $item) {
                $detalle = [];
                $detalle['venta_id'] = $objVenta->id;
                $detalle['producto_id'] = $item->producto->id;
                $detalle['cantidad'] = $item->cantidad;
                $detalle['precio'] = $item->precio;

                $total += $item->cantidad * $item->precio;

                DetalleVenta::create($detalle);
                $item->delete();
            }
            $objVenta->total = $total;
            $objVenta->update();

            return redirect()->route('ver-carrito')->with('success', 'Compra realizada correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('ver-carrito')->with('error', $th->getMessage());
        }
    }
}
