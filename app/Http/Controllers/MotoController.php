<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Moto;
use Illuminate\Http\Request;

/**
 * Class MotoController
 * @package App\Http\Controllers
 */
class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motos = Moto::paginate();

        return view('moto.index', compact('motos'))
            ->with('i', (request()->input('page', 1) - 1) * $motos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moto = new Moto();
        $clientes = Cliente::pluck('dui_cliente','id');
        return view('moto.create', compact('moto','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Moto::$rules);

        // $moto = Moto::create($request->all());

        //---- Validaciones ----

        $validacion = $request->validate([
            'id_placa' => 'required|size:7',
            'marca' => 'required',
            'id_cliente' => 'required'
        ]);

        $moto = Moto::create($request->all());

        return redirect()->route('motos.index')
            ->with('success', 'Nuevo registro agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $moto = Moto::find($id);
        $clientes = Cliente::pluck('dui_cliente','id');
        return view('moto.show', compact('moto','clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moto = Moto::find($id);
        $clientes = Cliente::pluck('dui_cliente','id');
        return view('moto.edit', compact('moto','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Moto $moto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moto $moto)
    {
        // request()->validate(Moto::$rules);

        //---- Validaciones ----

        $validacion = $request->validate([
            'id_placa' => 'required|size:7',
            'marca' => 'required',
            'id_cliente' => 'required'
        ]);

        $moto->update($request->all());

        return redirect()->route('motos.index')
            ->with('success', 'El registro se ha actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $moto = Moto::find($id)->delete();

        return redirect()->route('motos.index')
            ->with('success', 'Registro eliminado.');
    }
}
