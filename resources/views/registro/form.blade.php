<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha_llegada') }}
            {{ Form::text('fecha_llegada', $registro->fecha_llegada, ['class' => 'form-control' . ($errors->has('fecha_llegada') ? ' is-invalid' : ''), 'placeholder' => 'aa/mm/dd']) }}
            {!! $errors->first('fecha_llegada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_entrega') }}
            {{ Form::text('fecha_entrega', $registro->fecha_entrega, ['class' => 'form-control' . ($errors->has('fecha_entrega') ? ' is-invalid' : ''), 'placeholder' => 'aa/mm/dd']) }}
            {!! $errors->first('fecha_entrega', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_moto') }}
            {{ Form::select('id_moto',$motos, $registro->id_moto, ['class' => 'form-control' . ($errors->has('id_moto') ? ' is-invalid' : ''), 'placeholder' => 'Placa de la moto']) }}
            {!! $errors->first('id_moto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_servicio') }}
            {{ Form::select('id_servicio',$servicios, $registro->id_servicio, ['class' => 'form-control' . ($errors->has('id_servicio') ? ' is-invalid' : ''), 'placeholder' => 'Servicio']) }}
            {!! $errors->first('id_servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_servicio_r') }}
            {{ Form::number('precio_servicio_r', $registro->precio_servicio_r, ['class' => 'form-control' . ($errors->has('precio_servicio_r') ? ' is-invalid' : ''), 'placeholder' => '0.00' , 'step' => '0.01']) }}
            {!! $errors->first('precio_servicio_r', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_repuesto') }}
            {{ Form::select('id_repuesto',$repuestos, $registro->id_repuesto, ['class' => 'form-control' . ($errors->has('id_repuesto') ? ' is-invalid' : ''), 'placeholder' => 'Repuesto']) }}
            {!! $errors->first('id_repuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_repuesto_r') }}
            {{ Form::number('precio_repuesto_r', $registro->precio_repuesto_r, ['class' => 'form-control' . ($errors->has('precio_repuesto_r') ? ' is-invalid' : ''), 'placeholder' => '0.00' , 'step' => '0.01']) }}
            {!! $errors->first('precio_repuesto_r', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unidades') }}
            {{ Form::number('unidades', $registro->unidades, ['class' => 'form-control' . ($errors->has('unidades') ? ' is-invalid' : ''), 'placeholder' => 'Unidades']) }}
            {!! $errors->first('unidades', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $registro->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => '0.00', 'value' => '0.00', 'disabled']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>