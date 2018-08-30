@extends('layouts.app')

@section('title', 'Error')

@section('content')
    <br>
    <h1>Algo salió mal</h1>
    <hr>
    <div class="page-description">
        <h2>Whoopps! something went wrong :(</h2>
        {{ $exception->getMessage() }}
    </div>
    <br>
    <div>
        <a class="btn btn-dark" href="/">Volver al home</a>
    </div>
@endsection