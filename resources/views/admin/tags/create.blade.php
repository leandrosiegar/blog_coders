@extends('adminlte::page')

@section('title', 'Crear una etiqueta')

@section('content_header')
    <h1>Crear una etiqueta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(array('route' => 'admin.tags.store')) !!}
                @include('admin.tags.partials.form')

                {{ Form::submit('Crear etiqueta', array('type' => 'submit',
                    'class' => 'btn btn-primary', 'onclick' => '')) }}
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
