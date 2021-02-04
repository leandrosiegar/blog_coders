@extends('adminlte::page')

@section('title', 'Editar categoría')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }}</strong>
        </div>

    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, array('route' =>  ['admin.categories.update', $category],
                    'method' => 'PUT')) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre categoría:') !!}
                    {!! Form::text('name', null, array('placeholder' => 'Nombre categoría',
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

                {{ Form::submit('Actualizar categoría', array('type' => 'submit',
                    'class' => 'btn btn-primary', 'onclick' => 'return checkFormProd()')) }}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop

