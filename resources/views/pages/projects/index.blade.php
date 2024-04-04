@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>
            Lista Progetti
        </h1>

        <a class="btn btn-dark" href="{{ route('dashboard.projects.create') }}">Crea</a>

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                <a href="{{ route('dashboard.projects.show', $project->slug)}}">
                                {{ $project->title }}
                            </a>
                                
                            </td>
                            <td>{{ $project->content }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->cover_image }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('dashboard.projects.edit', $project->id) }}">
                                    Modifica
                                </a>
                                <form method="POST" action="{{ route('dashboard.projects.destroy', $project->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </main>
@endsection
