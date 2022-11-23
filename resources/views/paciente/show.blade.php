@extends('layouts.app')

@section('template_title')
    {{ $paciente->name ?? 'Show Paciente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Paciente Id:</strong>
                            {{ $paciente->paciente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Id Paciente:</strong>
                            {{ $paciente->tipo_id_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>Primer Apellido:</strong>
                            {{ $paciente->primer_apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Segundo Apellido:</strong>
                            {{ $paciente->segundo_apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Primer Nombre:</strong>
                            {{ $paciente->primer_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Segundo Nombre:</strong>
                            {{ $paciente->segundo_nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $paciente->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $paciente->edad }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion Residencia:</strong>
                            {{ $paciente->direccion_residencia }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Residencia:</strong>
                            {{ $paciente->telefono_residencia }}
                        </div>
                        <div class="form-group">
                            <strong>Zona Residencia Id:</strong>
                            {{ $paciente->zona_residencia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ocupacion Id:</strong>
                            {{ $paciente->ocupacion_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Registro:</strong>
                            {{ $paciente->fecha_registro }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo Id:</strong>
                            {{ $paciente->sexo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Estado Civil:</strong>
                            {{ $paciente->tipo_estado_civil }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $paciente->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento Id:</strong>
                            {{ $paciente->departamento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio Id:</strong>
                            {{ $paciente->municipio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pais Id:</strong>
                            {{ $paciente->pais_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Estrato Id:</strong>
                            {{ $paciente->tipo_estrato_id }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario Id:</strong>
                            {{ $paciente->usuario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Madre:</strong>
                            {{ $paciente->nombre_madre }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $paciente->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Lugar Expedicion Documentoervacion:</strong>
                            {{ $paciente->lugar_expedicion_documentoervacion }}
                        </div>
                        <div class="form-group">
                            <strong>Celular Telefono:</strong>
                            {{ $paciente->celular_telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $paciente->email }}
                        </div>
                        <div class="form-group">
                            <strong>Foto Paciente:</strong>
                            {{ $paciente->foto_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>Firma:</strong>
                            {{ $paciente->firma }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Regimen Id:</strong>
                            {{ $paciente->tipo_regimen_id }}
                        </div>
                        <div class="form-group">
                            <strong>Aseguradoras Id:</strong>
                            {{ $paciente->aseguradoras_id }}
                        </div>
                        <div class="form-group">
                            <strong>Foto Paciente Huella:</strong>
                            {{ $paciente->foto_paciente_huella }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
