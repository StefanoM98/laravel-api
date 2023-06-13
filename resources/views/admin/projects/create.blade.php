@extends('layouts.admin')

@section('content')
    <h2>Crea un nuovo progetto</h2>
    <a class="btn btn-primary mt-4" href="{{ route('admin.dashboard') }}">Torna alla tua dashboard</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="type">Seleziona il tipo</label>
            <select class="form-select" id="type" name="type_id">
                <option selected value=""></option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <h4>Selezione le tecnologia usate</h4>
            @foreach ($tecno as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tecno[]" value="{{ $item->id }}"
                        id="tecno-{{ $item->id }}" @checked(in_array($item->id, old('tecno', [])))>
                    <label class="form-check-label" for="tecno-{{ $item->id }}">
                        {{ $item->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Invia il nuovo progetto</button>
    </form>
@endsection
