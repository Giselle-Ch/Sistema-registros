@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? 'Show Cliente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles del cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre del cliente:</strong>
                            {{ $cliente->nombre_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Dui del cliente:</strong>
                            {{ $cliente->dui_cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $cliente->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $cliente->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
