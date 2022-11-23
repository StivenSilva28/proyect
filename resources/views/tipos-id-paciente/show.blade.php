@extends('layouts.app')

@section('template_title')
    {{ $tiposIdPaciente->name ?? 'Show Tipos Id Paciente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipos Id Paciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipos-id-pacientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo Id Paciente:</strong>
                            {{ $tiposIdPaciente->tipo_id_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>Abreviado:</strong>
                            {{ $tiposIdPaciente->abreviado }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $tiposIdPaciente->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo Alterno:</strong>
                            {{ $tiposIdPaciente->codigo_alterno }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
