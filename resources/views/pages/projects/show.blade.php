@extends('layouts.app')

@section('content')
    <main class="container">
        
        <h1>{{ $project->title }}</h1>

        @if ($project->cover_image)
            <img class="img-fluid" src="{{ asset('/storage/' . $project_images->cover_image) }}" alt="{{ $project->title }}">
        @endif
        <p>
            {{ $post->content }}
        </p>

    </main>
@endsection
