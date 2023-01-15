<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sexo_id') }}
            {{ Form::text('sexo_id', $tiposexo->sexo_id, ['class' => 'form-control' . ($errors->has('sexo_id') ? ' is-invalid' : ''), 'placeholder' => 'Sexo Id']) }}
            {!! $errors->first('sexo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sexo_tipo') }}
            {{ Form::text('sexo_tipo', $tiposexo->sexo_tipo, ['class' => 'form-control' . ($errors->has('sexo_tipo') ? ' is-invalid' : ''), 'placeholder' => 'Sexo Tipo']) }}
            {!! $errors->first('sexo_tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $tiposexo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sw_mostrar') }}
            {{ Form::text('sw_mostrar', $tiposexo->sw_mostrar, ['class' => 'form-control' . ($errors->has('sw_mostrar') ? ' is-invalid' : ''), 'placeholder' => 'Sw Mostrar']) }}
            {!! $errors->first('sw_mostrar', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>