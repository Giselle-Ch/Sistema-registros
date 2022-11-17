@extends('layouts.app')

@section('template_title')
    {{ $registro->name ?? 'Show Registro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles de la orden</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registros.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha de llegada:</strong>
                            {{ $registro->fecha_llegada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de entrega:</strong>
                            {{ $registro->fecha_entrega }}
                        </div>
                        <div class="form-group">
                            <strong>Placa de la moto:</strong>
                            {{ $registro->moto->id_placa }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio:</strong>
                            {{ $registro->servicio->nombre_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Precio del servicio:</strong>
                            {{ $registro->precio_servicio_r }}
                        </div>
                        <div class="form-group">
                            <strong>Repuesto:</strong>
                            {{ $registro->repuesto->nombre_repuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Precio unitario del repuesto:</strong>
                            {{ $registro->precio_repuesto_r }}
                        </div>
                        <div class="form-group">
                            <strong>Unidades:</strong>
                            {{ $registro->unidades }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $registro->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
