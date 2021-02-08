@extends('adminlte::page')

@section('title', 'Lista de Categorias')

@section('content_header')
    <a class="btn btn-primary float-right" href="{{ route('admin.posts.create') }} "> Añadir nuevo Post</a>
    <h1>Lista de Posts</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop
