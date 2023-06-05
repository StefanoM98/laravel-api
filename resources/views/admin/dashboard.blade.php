@extends('layouts.admin')

@section('content')
    <h1>Ciao Admin</h1>
    <a class="btn btn-primary mt-4" href="{{ route('admin.projects.index') }}">Vai ai tuoi progetti</a>
@endsection
