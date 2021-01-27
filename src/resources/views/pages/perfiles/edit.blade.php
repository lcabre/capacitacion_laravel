@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Editar Perfil</h3>
                <div class="container-sm">
                    <form action="{{ route('perfil.update', $perfil->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{$perfil->nombre}}">
                            @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input name="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" value="{{$perfil->apellido}}">
                            @error('apellido')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
