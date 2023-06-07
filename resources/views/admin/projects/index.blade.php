@extends('layouts.admin')

@section('content')
    <h1>La lista dei miei progetti</h1>
    <table class="table">
        <a class="btn btn-primary m-4" href="{{ route('admin.dashboard') }}">Vai alla tua dashboard</a>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary m-4">
            Crea un nuovo Progetto
        </a>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <form method="post" class="d-inline-block"
                            action="{{ route('admin.projects.destroy', $project->slug) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
