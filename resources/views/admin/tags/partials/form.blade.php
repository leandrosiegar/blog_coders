<div class="form-group">
    {!! Form::label('name', 'Nombre etiqueta:') !!}
    {!! Form::text('name', null, array('placeholder' => 'Nombre etiqueta',
        'class' => 'form-control')) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, array('placeholder' => 'Slug','readonly',
        'class' => 'form-control')) !!}

    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
