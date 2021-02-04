@extends('adminlte::page')

@section('title', 'Lista de Categorias')

@section('content_header')
    <h1>Lista de Categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary"
                href="{{ route('admin.categories.create') }}"> Añadir nueva categoría
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</td>
                        <th>Name</td>
                        <th colspan="2"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.categories.edit', $category) }}">Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category)}}" method="POST">
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
