<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Cliente::$rules);

        // $cliente = Cliente::create($request->all());

        //---- Validaciones ----

        $validacion = $request->validate([
            'nombre_cliente' => 'required|string',
            'dui_cliente' => 'required|regex:(^[0-9]{8}-[0-9]{1}$)|size:10|unique:clientes,dui_cliente',
            'celular' => 'required|regex:(([0-9][ -]*){8})|size:9',
            'correo' => 'nullable|regex:(^[^@]+@[^@]+\.[a-zA-Z]{2,}$)'
        ]);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index')
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
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        // request()->validate(Cliente::$rules);

        //---- Validaciones ----

        $validacion = $request->validate([
            'nombre_cliente' => 'required|string',
            'dui_cliente' => 'required|regex:(^[0-9]{8}-[0-9]{1}$)|size:10|',
            'celular' => 'required|regex:(([0-9][ -]*){8})|size:9',
            'correo' => 'nullable|regex:(^[^@]+@[^@]+\.[a-zA-Z]{2,}$)'
        ]);

        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->celular = $request->celular;
        $cliente->correo = $request->correo;

        $cliente->update();
        // $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'El registro se ha actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Registro eliminado.');
    }
}
