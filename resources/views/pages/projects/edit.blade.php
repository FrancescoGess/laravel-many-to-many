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
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control
                        @error('cover_image') is-invalid
                            
                        @enderror">
                </div>

            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select
                    class="
                    form-select
                    form-select-lg
                    @error('type_id') is invalid
                     @enderror"
                    name="type_id" id="type_id" required>
                    <option value="">Select one</option>

                    @foreach ($types as $element)
                        <option value="{{ $element->id }}" {{ $element->id == old('type_id') ? 'selected' : '' }}>
                            {{ $element->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="technologies" class="form-label">Select Technologies</label>
                <select multiple class="form-select form-select-lg" name="technologies[]" id="technologies">
                    <option value="">Select one</option>
                    @foreach ($technologies as $element)
                        {{-- validazione --}}
                        @if ($errors->any())
                            <option value="{{ $element->id }}"
                                {{ in_array($element->id, old('technologies', [])) ? 'selected' : '' }}>
                                {{ $element->name }}</option>
                        @else
                            <option value="{{ $element->id }}"
                                {{ $project->technologies->contains($element->id) ? 'selected' : '' }}>
                                {{ $element->name }}</option>
                        @endif
                        @endforeach
                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3">{{ old('content', $project->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary ">Modifica</button>


        </form>

    </main>
@endsection
