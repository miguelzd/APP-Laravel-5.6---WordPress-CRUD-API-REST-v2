@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <br>
    <h1>Publicaciones del Blog</h1>
    <hr>
    @foreach($posts as $post)
        <div class="media">
            <div class="media-body">
                @php $contect = strip_tags($post->content->rendered)
                @endphp
                <a href="editar/{{ $post->id }}"><h5 class="mt-0">{{ $post->title->rendered }}</h5></a>
                {{ $contect }}
            </div>
        </div>
        <hr>
    @endforeach     
    <a class="btn btn-primary" href="/nuevo">Agregar post</a>    
    <br>  
@endsection
