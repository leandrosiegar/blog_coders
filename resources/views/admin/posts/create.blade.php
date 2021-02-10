@extends('adminlte::page')

@section('title', 'Crear post')

@section('content_header')

    <h1>Crear post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(array('route' => 'admin.posts.store', 'files' => true)) !!}
                @include('admin.posts.partials.form')

                {{ Form::submit('Crear post', array('type' => 'submit',
                    'class' => 'btn btn-primary', 'onclick' => '')) }}
            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('css')
    <style>
        .image-wrapper {
            position:relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img {
            position:absolute;
            object-fit: cover;
            width:100%;
            height:100%;
        }
    </style>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script>
        //Cambiar imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event){
                var file = event.target.files[0];

                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById("imgDelPost").setAttribute('src', event.target.result);
                };

                reader.readAsDataURL(file);
            }
    </script>
@stop
