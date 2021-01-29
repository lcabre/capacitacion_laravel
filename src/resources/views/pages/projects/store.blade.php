@extends('layouts.app')

@section('content')
    <div class="container pepe">
        <div class="container p-3 my-3 border">
            <form action="{{ route('projects.store' ) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" value="{{old('name') ? old('name'): ''}}" class="form-control @error('name') is-invalid @enderror" aria-label="Nombre">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Fecha de entrega</label>
                        <input type="date" name="date" value="{{old('date') ? old('date'): ''}}" class="form-control @error('date') is-invalid @enderror" aria-label="Fecha de entrega">
                        @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>

@endsection

@push('scripts')

@endpush

