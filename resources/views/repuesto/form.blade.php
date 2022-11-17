<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_repuesto') }}
            {{ Form::text('nombre_repuesto', $repuesto->nombre_repuesto, ['class' => 'form-control' . ($errors->has('nombre_repuesto') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de repuesto']) }}
            {!! $errors->first('nombre_repuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $repuesto->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_repuesto') }}
            {{ Form::text('precio_repuesto', $repuesto->precio_repuesto, ['class' => 'form-control' . ($errors->has('precio_repuesto') ? ' is-invalid' : ''), 'placeholder' => '0.00']) }}
            {!! $errors->first('precio_repuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>