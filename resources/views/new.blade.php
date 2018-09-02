@extends('layouts.app')

@section('title', 'New')

@section('content')
    <br>
    <h1>Nueva publicación</h1>
    <hr>
    <form class="form-group" method="POST" action="/guardar">
        @csrf
        <div class="media">
            <div class="media-body">
                <div>
                    <label>Titulo</label>
                    <input class="form-control" type="text" name="title">
                </div>
                <br>
                <div>
                    <label>Contenido</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
            </div>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-dark" href="/">Volver</a>
        </div>
    </form>  
@endsection

