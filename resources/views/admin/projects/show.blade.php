@extends('layouts.admin')

@section('content')
    <a class="btn btn-primary mt-4" href="{{ route('admin.projects.index') }}">Torna indietro</a>
    <h1 class="text-center">{{ $project->title }}</h1>
    @if ($project->type)
        <p class="text-center">{{ $project->type->name }}</p>
    @else
        <p class="text-center">Non è impostata nessuna categoria</p>
    @endif
    <p class="text-center">{{ $project->description }}</p>
@endsection
