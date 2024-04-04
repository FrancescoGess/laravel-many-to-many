@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>
            Modifica Lista Progetti
        </h1>

        <form method="POST" action="{{ route('dashboard.projects.update', $project->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ old('title', $project->title) }}" type="text" class="form-control" name="title"
                    id="title" required />

                @error('title')
                    <div class="alert alert-danger">

                        {{ $message }}

                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3">{{ old('content', $project->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary ">Modifica</button>


        </form>

    </main>
@endsection
