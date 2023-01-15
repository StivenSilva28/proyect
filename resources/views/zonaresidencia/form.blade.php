<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('zona_residencia_id') }}
            {{ Form::text('zona_residencia_id', $zonaresidencia->zona_residencia_id, ['class' => 'form-control' . ($errors->has('zona_residencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Zona Residencia Id']) }}
            {!! $errors->first('zona_residencia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('zona_id') }}
            {{ Form::text('zona_id', $zonaresidencia->zona_id, ['class' => 'form-control' . ($errors->has('zona_id') ? ' is-invalid' : ''), 'placeholder' => 'Zona Id']) }}
            {!! $errors->first('zona_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $zonaresidencia->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>