@extends('layouts.app')

@section('template_title')
    {{ $repuesto->name ?? 'Show Repuesto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles del repuesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('repuestos.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre del repuesto:</strong>
                            {{ $repuesto->nombre_repuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $repuesto->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Precio del repuesto:</strong>
                            {{ $repuesto->precio_repuesto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
