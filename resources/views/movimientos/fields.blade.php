<div class="form-group col-sm-6">
    {!! Form::label('id_art', 'Artículo:') !!}
    {!! Form::select('id_art', $articulos, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Seleccione un artículo',
        'required'
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tipo_mov', 'Tipo de Movimiento:') !!}
    {!! Form::select('tipo_mov', ['Ingreso' => 'Ingreso', 'Egreso' => 'Egreso'], null, [
        'class' => 'form-control select2',
        'placeholder' => 'Seleccione tipo de movimiento',
        'required'
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, [
        'class' => 'form-control',
        'required',
        'min' => 1
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('fecha_crea', 'Fecha:') !!}
    {!! Form::text('fecha_crea', now()->format('Y-m-d H:i'), [
        'class' => 'form-control',
        'readonly'
    ]) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('observ', 'Observación:') !!}
    {!! Form::text('observ', null, ['class' => 'form-control', 'maxlength' => 255]) !!}
</div>
