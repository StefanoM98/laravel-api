@extends('layouts.admin')

@section('content')
    <a class="btn btn-primary mt-4" href="{{ route('admin.projects.index') }}">Torna indietro</a>
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="my-3">
        @if ($project->image)
            <img src="{{ str_contains($project->image, 'https://') ? $project->image : assett('storage/' . $project->image) }}"
                alt="{{ $project->title }}">
        @else
            <div class="w-25 p-5 bg-secondary">
                nessuna immagine
            </div>
        @endif

    </div>
    @if ($project->type)
        <p class="text-center">{{ $project->type->name }}</p>
    @else
        <p class="text-center">Non è impostata nessuna categoria</p>
    @endif

    <div class="mt-3">
        <h4>Tecnologie</h4>
        @forelse ($project->technologies as $tec)
            <span>{{ $tec->name }}</span>
        @empty
            <span>Niente</span>
        @endforelse
    </div>
    <p class="text-center">{{ $project->description }}</p>
@endsection
