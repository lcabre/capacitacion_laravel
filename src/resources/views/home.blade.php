@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <input type="BUTTON" value="Usuarios" onclick="window.location.href='{{ route('users.index') }}'">
        <input type="BUTTON" value="Crear Projecto" onclick="window.location.href='{{ route('projects.create') }}'">
        <input type="BUTTON" value="Projectos" onclick="window.location.href='{{ route('projects.index') }}'">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
