<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_servicio') }}
            {{ Form::text('nombre_servicio', $servicio->nombre_servicio, ['class' => 'form-control' . ($errors->has('nombre_servicio') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del servicio']) }}
            {!! $errors->first('nombre_servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detalle') }}
            {{ Form::text('detalle', $servicio->detalle, ['class' => 'form-control' . ($errors->has('detalle') ? ' is-invalid' : ''), 'placeholder' => 'Detalle']) }}
            {!! $errors->first('detalle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_servicio') }}
            {{ Form::number('precio_servicio', $servicio->precio_servicio, ['class' => 'form-control' . ($errors->has('precio_servicio') ? ' is-invalid' : ''), 'placeholder' => '0.00', 'step' => '0.01']) }}
            {!! $errors->first('precio_servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>