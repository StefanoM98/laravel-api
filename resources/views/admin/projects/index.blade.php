@extends('layouts.admin')

@section('content')
    <h1>La lista dei miei progetti</h1>
    <table class="table">
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
                    {{-- <td>
                    <a href="{{ route }}"></a>
                </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
