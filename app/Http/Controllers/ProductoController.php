<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
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
        $productos = Producto::where('nombre', 'LIKE', $filter . '%')->paginate(10);
        return view('admin.producto.index', compact('productos', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::all();
        return view('admin.producto.create', compact('producto', 'categorias'));
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
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:1024',
            'categoria_id' => 'required',
        ]);

        $producto = $request->all();
        try {

            if ($imagen = $request->file('imagen')) {
                $ruta = 'img-product/';
                $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($ruta, $imagenProducto);
                $producto['imagen'] = "$imagenProducto";
            }

            Producto::create($producto);
            return redirect()->route('productos')->with('success', 'Producto creado correctamente');
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
        $producto = Producto::findOrFail($id);

        return view('admin.producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();

        return view('admin.producto.edit', compact('producto', 'categorias'));
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
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:1024',
            'categoria_id' => 'required',
        ]);

        try {
            $producto = Producto::findOrFail($id);

            if ($imagen = $request->file('imagen')) {
                $ruta = 'img-product/';
                $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($ruta, $imagenProducto);
                $producto['imagen'] = "$imagenProducto";
            }

            $producto->nombre = $request->get('nombre');
            $producto->caracteristica = $request->get('caracteristica');
            $producto->stock = $request->get('stock');
            $producto->precio = $request->get('precio');
            $producto->update();

            return redirect()->route('productos')->with('success', 'Producto actualizado correctamente');
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
            $producto = Producto::findOrFail($id);

            $producto->delete();
            return redirect()->route('productos')->with('success', 'Producto eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('productos')->with('error', $th->getMessage());
        }
    }
}
