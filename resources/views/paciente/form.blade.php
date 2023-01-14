<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">

        <div class="col-3">
            {{-- {{ Form::label('paciente_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('paciente_id', $paciente->paciente_id, ['class' => 'form-control' . ($errors->has('paciente_id') ? ' is-invalid' : ''), 'placeholder' => 'Paciente Id']) }}
            {!! $errors->first('paciente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="col-3">
            {{-- {{ Form::label('primer_apellido') }} --}}
            {{ Form::label('') }}
            {{ Form::text('primer_apellido', $paciente->primer_apellido, ['class' => 'form-control' . ($errors->has('primer_apellido') ? ' is-invalid' : ''), 'placeholder' => 'Primer Apellido']) }}
            {!! $errors->first('primer_apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('segundo_apellido') }} --}}
            {{ Form::label('') }}
            {{ Form::text('segundo_apellido', $paciente->segundo_apellido, ['class' => 'form-control' . ($errors->has('segundo_apellido') ? ' is-invalid' : ''), 'placeholder' => 'Segundo Apellido']) }}
            {!! $errors->first('segundo_apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('primer_nombre') }} --}}
            {{ Form::label('') }}
            {{ Form::text('primer_nombre', $paciente->primer_nombre, ['class' => 'form-control' . ($errors->has('primer_nombre') ? ' is-invalid' : ''), 'placeholder' => 'Primer Nombre']) }}
            {!! $errors->first('primer_nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('segundo_nombre') }} --}}
            {{ Form::label('') }}
            {{ Form::text('segundo_nombre', $paciente->segundo_nombre, ['class' => 'form-control' . ($errors->has('segundo_nombre') ? ' is-invalid' : ''), 'placeholder' => 'Segundo Nombre']) }}
            {!! $errors->first('segundo_nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('fecha_nacimiento') }} --}}
            {{ Form::label('') }}
            {{ Form::text('fecha_nacimiento', $paciente->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('edad') }} --}}
            {{ Form::label('') }}
            {{ Form::text('edad', $paciente->edad, ['class' => 'form-control' . ($errors->has('edad') ? ' is-invalid' : ''), 'placeholder' => 'Edad']) }}
            {!! $errors->first('edad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('direccion_residencia') }} --}}
            {{ Form::label('') }}
            {{ Form::text('direccion_residencia', $paciente->direccion_residencia, ['class' => 'form-control' . ($errors->has('direccion_residencia') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Residencia']) }}
            {!! $errors->first('direccion_residencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('telefono_residencia') }} --}}
            {{ Form::label('') }}
            {{ Form::text('telefono_residencia', $paciente->telefono_residencia, ['class' => 'form-control' . ($errors->has('telefono_residencia') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Residencia']) }}
            {!! $errors->first('telefono_residencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('zona_residencia_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('zona_residencia_id', $paciente->zona_residencia_id, ['class' => 'form-control' . ($errors->has('zona_residencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Zona Residencia Id']) }}
            {!! $errors->first('zona_residencia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('ocupacion_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('ocupacion_id', $paciente->ocupacion_id, ['class' => 'form-control' . ($errors->has('ocupacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Ocupacion Id']) }}
            {!! $errors->first('ocupacion_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('fecha_registro') }} --}}
            {{ Form::label('') }}
            {{ Form::text('fecha_registro', $paciente->fecha_registro, ['class' => 'form-control' . ($errors->has('fecha_registro') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Registro']) }}
            {!! $errors->first('fecha_registro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('sexo_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('sexo_id', $paciente->sexo_id, ['class' => 'form-control' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'placeholder' => 'Sexo Id']) }}
            {!! $errors->first('sexo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('tipo_estado_civil') }} --}}
            {{ Form::label('') }}
            {{ Form::text('tipo_estado_civil', $paciente->tipo_estado_civil, ['class' => 'form-control' . ($errors->has('tipo_estado_civil') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Estado Civil']) }}
            {!! $errors->first('tipo_estado_civil', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('foto') }} --}}
            {{ Form::label('') }}
            {{ Form::text('foto', $paciente->foto, ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('departamento_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('departamento_id', $paciente->departamento_id, ['class' => 'form-control' . ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => 'Departamento Id']) }}
            {!! $errors->first('departamento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('municipio_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('municipio_id', $paciente->municipio_id, ['class' => 'form-control' . ($errors->has('municipio_id') ? ' is-invalid' : ''), 'placeholder' => 'Municipio Id']) }}
            {!! $errors->first('municipio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('pais_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('pais_id', $paciente->pais_id, ['class' => 'form-control' . ($errors->has('pais_id') ? ' is-invalid' : ''), 'placeholder' => 'Pais Id']) }}
            {!! $errors->first('pais_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('tipo_estrato_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('tipo_estrato_id', $paciente->tipo_estrato_id, ['class' => 'form-control' . ($errors->has('tipo_estrato_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Estrato Id']) }}
            {!! $errors->first('tipo_estrato_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('usuario_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('usuario_id', $paciente->usuario_id, ['class' => 'form-control' . ($errors->has('usuario_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario Id']) }}
            {!! $errors->first('usuario_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('nombre_madre') }} --}}
            {{ Form::label('') }}
            {{ Form::text('nombre_madre', $paciente->nombre_madre, ['class' => 'form-control' . ($errors->has('nombre_madre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Madre']) }}
            {!! $errors->first('nombre_madre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('observacion') }} --}}
            {{ Form::label('') }}
            {{ Form::text('observacion', $paciente->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('lugar_expedicion_documentoervacion') }} --}}
            {{ Form::label('') }}
            {{ Form::text('lugar_expedicion_documentoervacion', $paciente->lugar_expedicion_documentoervacion, ['class' => 'form-control' . ($errors->has('lugar_expedicion_documentoervacion') ? ' is-invalid' : ''), 'placeholder' => 'Lugar Expedicion Documentoervacion']) }}
            {!! $errors->first('lugar_expedicion_documentoervacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('celular_telefono') }} --}}
            {{ Form::label('') }}
            {{ Form::text('celular_telefono', $paciente->celular_telefono, ['class' => 'form-control' . ($errors->has('celular_telefono') ? ' is-invalid' : ''), 'placeholder' => 'Celular Telefono']) }}
            {!! $errors->first('celular_telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('email') }} --}}
            {{ Form::label('') }}
            {{ Form::text('email', $paciente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('foto_paciente') }} --}}
            {{ Form::label('') }}
            {{ Form::text('foto_paciente', $paciente->foto_paciente, ['class' => 'form-control' . ($errors->has('foto_paciente') ? ' is-invalid' : ''), 'placeholder' => 'Foto Paciente']) }}
            {!! $errors->first('foto_paciente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('firma') }} --}}
            {{ Form::label('') }}
            {{ Form::text('firma', $paciente->firma, ['class' => 'form-control' . ($errors->has('firma') ? ' is-invalid' : ''), 'placeholder' => 'Firma']) }}
            {!! $errors->first('firma', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('tipo_regimen_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('tipo_regimen_id', $paciente->tipo_regimen_id, ['class' => 'form-control' . ($errors->has('tipo_regimen_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Regimen Id']) }}
            {!! $errors->first('tipo_regimen_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('aseguradoras_id') }} --}}
            {{ Form::label('') }}
            {{ Form::text('aseguradoras_id', $paciente->aseguradoras_id, ['class' => 'form-control' . ($errors->has('aseguradoras_id') ? ' is-invalid' : ''), 'placeholder' => 'Aseguradoras Id']) }}
            {!! $errors->first('aseguradoras_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-3">
            {{-- {{ Form::label('foto_paciente_huella') }} --}}
            {{ Form::label('') }}
            {{ Form::file('foto_paciente_huella', $paciente->foto_paciente_huella, ['class' => 'form-control form-control-lg' . ($errors->has('foto_paciente_huella') ? ' is-invalid' : ''), 'placeholder' => 'Foto Paciente Huella']) }}
            {!! $errors->first('foto_paciente_huella', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>


    </div>
    </div>
    <div class="box-footer mt20">
        <br>
        <div class="row col-2 mx-auto" >

            <button type="submit" class="btn btn-success">INGRESAR PACIENTE</button>
        </div>
    </div>
</div>
