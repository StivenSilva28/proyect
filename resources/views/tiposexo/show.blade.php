@extends('layouts.app')

@section('template_title')
    {{ $tiposexo->name ?? 'Show Tiposexo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tiposexo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tiposexos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Sexo Id:</strong>
                            {{ $tiposexo->sexo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo Tipo:</strong>
                            {{ $tiposexo->sexo_tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $tiposexo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Sw Mostrar:</strong>
                            {{ $tiposexo->sw_mostrar }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
