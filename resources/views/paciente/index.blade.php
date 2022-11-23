@extends('layouts.app')

@section('template_title')
    Paciente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Paciente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Paciente Id</th>
										<th>Tipo Id Paciente</th>
										<th>Primer Apellido</th>
										<th>Segundo Apellido</th>
										<th>Primer Nombre</th>
										<th>Segundo Nombre</th>
										<th>Fecha Nacimiento</th>
										<th>Edad</th>
										<th>Direccion Residencia</th>
										<th>Telefono Residencia</th>
										<th>Zona Residencia Id</th>
										<th>Ocupacion Id</th>
										<th>Fecha Registro</th>
										<th>Sexo Id</th>
										<th>Tipo Estado Civil</th>
										<th>Foto</th>
										<th>Departamento Id</th>
										<th>Municipio Id</th>
										<th>Pais Id</th>
										<th>Tipo Estrato Id</th>
										<th>Usuario Id</th>
										<th>Nombre Madre</th>
										<th>Observacion</th>
										<th>Lugar Expedicion Documentoervacion</th>
										<th>Celular Telefono</th>
										<th>Email</th>
										<th>Foto Paciente</th>
										<th>Firma</th>
										<th>Tipo Regimen Id</th>
										<th>Aseguradoras Id</th>
										<th>Foto Paciente Huella</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $paciente->paciente_id }}</td>
											<td>{{ $paciente->tipo_id_paciente }}</td>
											<td>{{ $paciente->primer_apellido }}</td>
											<td>{{ $paciente->segundo_apellido }}</td>
											<td>{{ $paciente->primer_nombre }}</td>
											<td>{{ $paciente->segundo_nombre }}</td>
											<td>{{ $paciente->fecha_nacimiento }}</td>
											<td>{{ $paciente->edad }}</td>
											<td>{{ $paciente->direccion_residencia }}</td>
											<td>{{ $paciente->telefono_residencia }}</td>
											<td>{{ $paciente->zona_residencia_id }}</td>
											<td>{{ $paciente->ocupacion_id }}</td>
											<td>{{ $paciente->fecha_registro }}</td>
											<td>{{ $paciente->sexo_id }}</td>
											<td>{{ $paciente->tipo_estado_civil }}</td>
											<td>{{ $paciente->foto }}</td>
											<td>{{ $paciente->departamento_id }}</td>
											<td>{{ $paciente->municipio_id }}</td>
											<td>{{ $paciente->pais_id }}</td>
											<td>{{ $paciente->tipo_estrato_id }}</td>
											<td>{{ $paciente->usuario_id }}</td>
											<td>{{ $paciente->nombre_madre }}</td>
											<td>{{ $paciente->observacion }}</td>
											<td>{{ $paciente->lugar_expedicion_documentoervacion }}</td>
											<td>{{ $paciente->celular_telefono }}</td>
											<td>{{ $paciente->email }}</td>
											<td>{{ $paciente->foto_paciente }}</td>
											<td>{{ $paciente->firma }}</td>
											<td>{{ $paciente->tipo_regimen_id }}</td>
											<td>{{ $paciente->aseguradoras_id }}</td>
											<td>{{ $paciente->foto_paciente_huella }}</td>

                                            <td>
                                                <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pacientes.show',$paciente->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pacientes.edit',$paciente->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>
@endsection
