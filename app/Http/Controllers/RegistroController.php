<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use App\Models\Registro;
use App\Models\Repuesto;
use App\Models\Servicio;
use Illuminate\Http\Request;

/**
 * Class RegistroController
 * @package App\Http\Controllers
 */
class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registro::paginate();

        return view('registro.index', compact('registros'))
            ->with('i', (request()->input('page', 1) - 1) * $registros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registro = new Registro();
        $motos = Moto::pluck('id_placa','id');
        $servicios = Servicio::pluck('nombre_servicio','id');
        $repuestos = Repuesto::pluck('nombre_repuesto','id');
        return view('registro.create', compact('registro','motos','servicios','repuestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Registro::$rules);
        
        // $registro = Registro::create($request->all());

        //---- Validaciones ----

        $validacion = $request->validate([
            'fecha_llegada' => 'required|date',
            'fecha_entrega' => 'required|date|after:fecha_llegada',
            'id_moto' => 'required',
            'id_servicio' => 'required',
            'precio_servicio_r' => 'required',
            'id_repuesto' => 'required',
            'unidades' => 'required',
            'precio_repuesto_r' => 'required',
        ]);

        $registroTot = new Registro();
        $registroTot->fecha_llegada = $request->fecha_llegada;
        $registroTot->fecha_entrega = $request->fecha_entrega;
        $registroTot->id_moto = $request->id_moto;
        $registroTot->id_servicio = $request->id_servicio;
        $registroTot->precio_servicio_r = $request->precio_servicio_r;
        $registroTot->id_repuesto = $request->id_repuesto;
        $registroTot->unidades = $request->unidades;
        $registroTot->precio_repuesto_r = $request->precio_repuesto_r;
        $registroTot->total = ($request->precio_servicio_r + ($request->unidades * $request->precio_repuesto_r));

        $registroTot->save();

        return redirect()->route('registros.index')
            ->with('success', 'Nuevo registro agregdo exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Registro::find($id);
        $motos = Moto::pluck('id_placa','id');
        $servicios = Servicio::pluck('nombre_servicio','id');
        $repuestos = Repuesto::pluck('nombre_repuesto','id');
        return view('registro.show', compact('registro','motos','servicios','repuestos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Registro::find($id);
        $motos = Moto::pluck('id_placa','id');
        $servicios = Servicio::pluck('nombre_servicio','id');
        $repuestos = Repuesto::pluck('nombre_repuesto','id');
        return view('registro.edit', compact('registro','motos','servicios','repuestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Registro $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        request()->validate(Registro::$rules);

        $registro->update($request->all());

        return redirect()->route('registros.index')
            ->with('success', 'El registro se ha actualizado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $registro = Registro::find($id)->delete();

        return redirect()->route('registros.index')
            ->with('success', 'Registro eliminado.');
    }
}
