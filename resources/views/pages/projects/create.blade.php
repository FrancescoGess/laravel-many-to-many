@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>
            Lista Progetti
        </h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.projects.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" required />

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
                        <option value="{{ $element->id }}" 
                            {{ $element->id == old('type_id') ? 'selected' : '' }}>
                            {{ $element->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary ">Crea nuovo Progetto</button>


        </form>

    </main>
@endsection
