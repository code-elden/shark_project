<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        session(['rol' => $user->rol->nombre]);

        if ($user->rol->nombre == 'Administrador') {
            return redirect()->route('users');
        }

        return redirect()->route('inicio');
    }

    public function catalogo()
    {
        return view('client.catalogo');
    }

    public function contactanos()
    {
        return view('contactanos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveContactanos(Request $request)
    {
        return redirect()->route('home.contactanos');
    }

    public function integrantes()
    {
        return view('integrantes');
    }

    public function nosotros()
    {
        return view('nosotros');
    }
}
