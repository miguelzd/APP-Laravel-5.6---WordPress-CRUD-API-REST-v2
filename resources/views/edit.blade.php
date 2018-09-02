@extends('layouts.app')

@section('title', 'Edit')

@section('content')
    @php 
        $id = $post->id;
        $title = strip_tags($post->title->rendered);
        $contect = strip_tags($post->content->rendered);
    @endphp
    <br>
    <h1>Editar publicación</h1>
    <hr>
    <form class="form-group" method="POST" action="/actualizar">
        @csrf
        <div class="media">
            <div class="media-body">
                <div>
                    <input class="form-control" type="hidden" name="id" value="{{ $id }}">
                </div>
                <div>
                    <label>Titulo</label>
                    <input class="form-control" type="text" name="title" value="{{ $title }}">
                </div>
                <br>
                <div>
                    <label>Contenido</label>
                    <textarea class="form-control" name="content" rows="3">{{ $contect }}</textarea>
                </div>
            </div>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-dark" href="/">Volver</a>
            <a class="btn btn-danger" href="/eliminar/{{ $id }}">Eliminar</a>
        </div>
    </form>   
@endsection