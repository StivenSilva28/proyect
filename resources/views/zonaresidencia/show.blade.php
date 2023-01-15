@extends('layouts.app')

@section('template_title')
    {{ $zonaresidencia->name ?? 'Show Zonaresidencia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Zonaresidencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('zonaresidencias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Zona Residencia Id:</strong>
                            {{ $zonaresidencia->zona_residencia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Zona Id:</strong>
                            {{ $zonaresidencia->zona_id }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $zonaresidencia->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
