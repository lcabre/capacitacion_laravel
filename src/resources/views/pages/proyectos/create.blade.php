@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form action="{{ route('proyectos.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre del proyecto</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nasa Rocket" aria-label="Nombre del proyecto">
                            @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fecha_entrega">Fecha de entrega</label>
                            <input name="fecha_entrega" type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" aria-label="Fecha de entrega">
                            @error('fecha_entrega')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="integrantes">Integrantes</label>
                            <select multiple class="form-control @error('integrantes[]') is-invalid @enderror" name="integrantes[]" aria-label="Integrantes">
                                <option value="">Seleccione una opcion</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                @endforeach
                            </select>
                            @error('integrantes[]')
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
