{{-- Descripción --}}
<div class="form-group col-sm-12">
    {!! Form::label('art_desc', 'Descripción:') !!}
    {!! Form::text('art_desc', null, [
        'class' => 'form-control',
        'required',
        'maxlength' => 45
    ]) !!}
</div>

{{-- Marca (Select2) --}}
<div class="form-group col-sm-6">
    {!! Form::label('id_marca', 'Marca:') !!}
    {!! Form::select('id_marca', $marca, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Seleccione una marca',
        'required'
    ]) !!}
</div>

{{-- Línea (Select2) --}}
<div class="form-group col-sm-6">
    {!! Form::label('id_linea', 'Línea:') !!}
    {!! Form::select('id_linea', $linea, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Seleccione una línea',
        'required'
    ]) !!}
</div>
