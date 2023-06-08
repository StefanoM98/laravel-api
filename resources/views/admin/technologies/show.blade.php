@extends('layouts.admin')

@section('content')
    <a class="btn btn-primary mt-4" href="{{ route('admin.technologies.index') }}">Torna indietro</a>
    <h2>Tecnologia: {{ $technology->name }}</h2>
@endsection
