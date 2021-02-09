@extends('adminlte::page')

@section('title', 'Crear post')

@section('content_header')

    <h1>Crear post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(array('route' => 'admin.posts.store', 'files' => true)) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre del post:') !!}
                    {!! Form::text('name', null, array('placeholder' => 'Nombre del post',
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
                    {!! Form::label('category_id', 'Categoría:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{ $tag->name }}
                        </label>
                    @endforeach

                    @error('tags')
                        <br>
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                        <label>
                            {!! Form::radio('status', 1, true) !!}
                            Borrador
                        </label>
                        <label>
                            {!! Form::radio('status', 2) !!}
                            Publicado
                        </label>

                    @error('status')
                        <br>
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="image-wrapper"> <!-- imagen por defecto si no tiene imagen -->
                            <img id="imgDelPost" src="https://cdn.pixabay.com/photo/2020/03/23/19/17/jack-russel-4961793_960_720.jpg" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen que se mostrará en el post:') !!}
                            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        </div>
                    </div>

                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    {!! Form::label('extract', 'Extracto:') !!}
                    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                    @error('extract')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Descripción del post:') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

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
