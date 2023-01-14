@extends('layouts.app')

@section('template_title')
    Tiposidpaciente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tiposidpaciente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tiposidpacientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Tipo Id Paciente</th>
										<th>Abreviado</th>
										<th>Descripcion</th>
										<th>Codigo Alterno</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tiposidpacientes as $tiposidpaciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tiposidpaciente->tipo_id_paciente }}</td>
											<td>{{ $tiposidpaciente->abreviado }}</td>
											<td>{{ $tiposidpaciente->descripcion }}</td>
											<td>{{ $tiposidpaciente->codigo_alterno }}</td>

                                            <td>
                                                <form action="{{ route('tiposidpacientes.destroy',$tiposidpaciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tiposidpacientes.show',$tiposidpaciente->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tiposidpacientes.edit',$tiposidpaciente->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tiposidpacientes->links() !!}
            </div>
        </div>
    </div>
@endsection
