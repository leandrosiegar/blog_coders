@extends('adminlte::page')

@section('title', 'Listar las etiquetas')

@section('content_header')
    <h1>Listar las etiquetas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary float-right"
                href="{{ route('admin.tags.create') }}"> Añadir nueva etiqueta
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Name</td>
                        <th>Color</td>
                        <th colspan="2"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->color }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.tags.edit', $tag) }}">Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>

                            </td>
                        </tr>


                    @endforeach

                <tbody>
            </table>
        </div>
    </div>
@stop

