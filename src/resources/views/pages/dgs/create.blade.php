@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Crear DG</h3>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form action="{{ route('dgs.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input value="{{old('nombre')}}" name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="DG de Opinion Publica" aria-label="Nombre de la DG">
                            @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection