@extends('layouts.admin')

@section('content')
    <a class="btn btn-primary mt-4" href="{{ route('admin.projects.index') }}">Torna indietro</a>
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
@endsection
