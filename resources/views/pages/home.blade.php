@extends('layout')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Project Flyer</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a
                jumbotron and three supporting pieces of content. Use it as a starting point to create something more
                unique.</p>
                @if (auth()->check())
                    <a class="btn btn-primary btn-lg" href="/flyers/create" role="button">Create a Flyer</a>
                @else
                    <a class="btn btn-primary btn-lg mr-2" href="/login" role="button">Sign In</a>
                    <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
                @endif
        </div>
    </div>
@endsection