<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class TiendaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $categoria = '')
    {
        $filter = $request->get('filter');
        $productos = Producto::join('categorias as c', 'productos.categoria_id', '=', 'c.id')
            ->where('productos.nombre', 'LIKE', $filter . '%')
            ->where('c.nombre', 'LIKE', $categoria . '%')
            ->select('productos.*')
            ->paginate(8);

        $categorias = Categoria::all();

        return view('client.catalogo', compact('productos', 'categorias', 'filter', 'categoria'));
    }

    public function showProduct($id){
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();

        return view('client.ver-producto', compact('producto', 'categorias'));
    }
}
