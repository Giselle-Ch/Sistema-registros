@extends('layouts.app')

@section('template_title')
    Motos registradas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Motos registradas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('motos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar moto') }}
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
                                        
										<th>Placa</th>
										<th>Marca</th>
										<th>Color</th>
                                        <th>Cliente</th>
										<th>DUI del cliente</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($motos as $moto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $moto->id_placa }}</td>
											<td>{{ $moto->marca }}</td>
											<td>{{ $moto->color }}</td>
                                            <td>{{ $moto->cliente->nombre_cliente }}</td>
											<td>{{ $moto->cliente->dui_cliente }}</td>

                                            <td>
                                                <form action="{{ route('motos.destroy',$moto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('motos.show',$moto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('motos.edit',$moto->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $motos->links() !!}
            </div>
        </div>
    </div>
@endsection
