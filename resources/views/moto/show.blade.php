@extends('layouts.app')

@section('template_title')
    {{ $moto->name ?? 'Show Moto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles de la moto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('motos.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Placa de la moto:</strong>
                            {{ $moto->id_placa }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $moto->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $moto->color }}
                        </div>
                        <div class="form-group">
                            <strong>DUI del cliente:</strong>
                            {{ $moto->cliente->dui_cliente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
