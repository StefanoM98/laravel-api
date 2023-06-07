@extends('layouts.admin')

@section('content')
    <h2>Modifica progetto: {{ $project->title }}</h2>
    <a class="btn btn-primary mt-4" href="{{ route('admin.dashboard') }}">Torna alla dashboard</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-3">
            <label for="type">Seleziona il tipo</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @selected($type->id == old('type_id', $project->type?->id))>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Invia la modifica del progetto</button>
    </form>
@endsection
