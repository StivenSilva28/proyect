@extends('layouts.app')

@section('template_title')
    {{ $tiposidpaciente->name ?? 'Show Tiposidpaciente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tiposidpaciente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tiposidpacientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo Id Paciente:</strong>
                            {{ $tiposidpaciente->tipo_id_paciente }}
                        </div>
                        <div class="form-group">
                            <strong>Abreviado:</strong>
                            {{ $tiposidpaciente->abreviado }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $tiposidpaciente->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo Alterno:</strong>
                            {{ $tiposidpaciente->codigo_alterno }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
