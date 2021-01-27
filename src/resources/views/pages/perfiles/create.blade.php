@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">Crear Perfil</h3>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form action="{{ route('perfil.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="Jane">
                            @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input name="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" placeholder="Doe" ">
                            @error('apellido')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
