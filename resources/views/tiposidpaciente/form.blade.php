<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipo_id_paciente') }}
            {{ Form::text('tipo_id_paciente', $tiposidpaciente->tipo_id_paciente, ['class' => 'form-control' . ($errors->has('tipo_id_paciente') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Id Paciente']) }}
            {!! $errors->first('tipo_id_paciente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('abreviado') }}
            {{ Form::text('abreviado', $tiposidpaciente->abreviado, ['class' => 'form-control' . ($errors->has('abreviado') ? ' is-invalid' : ''), 'placeholder' => 'Abreviado']) }}
            {!! $errors->first('abreviado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $tiposidpaciente->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codigo_alterno') }}
            {{ Form::text('codigo_alterno', $tiposidpaciente->codigo_alterno, ['class' => 'form-control' . ($errors->has('codigo_alterno') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Alterno']) }}
            {!! $errors->first('codigo_alterno', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>