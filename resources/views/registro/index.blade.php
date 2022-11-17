@extends('layouts.app')

@section('template_title')
    Registros de ordenes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registros de ordenes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar orden') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Fecha de llegada</th>
										<th>Fecha de entrega</th>
										<th>Placa de la moto</th>
										<th>Servicio</th>
										<th>Precio del servicio</th>
										<th>Repuesto</th>
										<th>Precio U. del repuesto</th>
										<th>Unidades</th>
										<th>Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $registro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $registro->fecha_llegada }}</td>
											<td>{{ $registro->fecha_entrega }}</td>
											<td>{{ $registro->moto->id_placa }}</td>
											<td>{{ $registro->servicio->nombre_servicio }}</td>
											<td>{{ $registro->precio_servicio_r }}</td>
											<td>{{ $registro->repuesto->nombre_repuesto }}</td>
											<td>{{ $registro->precio_repuesto_r }}</td>
											<td>{{ $registro->unidades }}</td>
											<td>{{ $registro->total }}</td>

                                            <td>
                                                <form action="{{ route('registros.destroy',$registro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registros.show',$registro->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registros.edit',$registro->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $registros->links() !!}
            </div>
        </div>
    </div>
@endsection
