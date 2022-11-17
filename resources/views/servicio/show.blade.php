@extends('layouts.app')

@section('template_title')
    {{ $servicio->name ?? 'Show Servicio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles del servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre del servicio:</strong>
                            {{ $servicio->nombre_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Detalle:</strong>
                            {{ $servicio->detalle }}
                        </div>
                        <div class="form-group">
                            <strong>Precio del servicio:</strong>
                            {{ $servicio->precio_servicio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
