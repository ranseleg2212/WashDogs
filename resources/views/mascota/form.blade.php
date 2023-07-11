<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::hidden('mascota_id', $mascota->mascota_id, ['class' => 'form-control' . ($errors->has('mascota_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('mascota_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::hidden('id_user', Auth::user()->id, ['class' => 'form-control' . ($errors->has('mascota_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $mascota->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('raza') }}
            {{ Form::text('raza', $mascota->raza, ['class' => 'form-control' . ($errors->has('raza') ? ' is-invalid' : ''), 'placeholder' => 'Raza']) }}
            {!! $errors->first('raza', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('condicion') }}
            {{ Form::text('condicion', $mascota->condicion, ['class' => 'form-control' . ($errors->has('condicion') ? ' is-invalid' : ''), 'placeholder' => 'Condicion']) }}
            {!! $errors->first('condicion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('edad') }}
            {{ Form::text('edad', $mascota->edad, ['class' => 'form-control' . ($errors->has('edad') ? ' is-invalid' : ''), 'placeholder' => 'Edad']) }}
            {!! $errors->first('edad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::select('genero', ['Macho' => 'Macho', 'Hembra' => 'Hembra'], $mascota->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el género']) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 mt-3">
        <button type="submit" class="col-12 btn btn-primary bg-blue-700 text-white font-bold">{{ __('Submit') }}</button>
    </div>
</div>
