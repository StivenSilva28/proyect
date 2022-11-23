@extends('layouts.app')

@section('template_title')
    Create Paciente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        {{-- <span class="card-title">Añadir Pacientes</span> --}}
                        <h5>Añadir Pacientes</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pacientes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('paciente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
