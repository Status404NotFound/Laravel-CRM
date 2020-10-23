@extends('layouts.app')

@section('content')

<div class="col-lg-8">

    <!-- Title -->
    <h1 class="mt-4">{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ $post->published_at }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{ $post->image_url }}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{ $post->description }}</p>

    <p>{{ $post->content_text }}</p>

    <hr>
    <p>Просмотров: {{$views}}</p>

</div>
@endsection
