@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Editar Proyecto</h3>
                <div class="container-sm">
                    <form action="{{ route('proyectos.update', $proyecto->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre del proyecto</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nasa Rocket" aria-label="Nombre del proyecto" value="{{$proyecto->nombre}}">
                            @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fecha_entrega">Fecha de entrega</label>
                            <input name="fecha_entrega" type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" aria-label="Fecha de entrega" value="{{$proyecto->fecha_entrega}}">
                            @error('fecha_entrega')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="integrantes">Integrantes</label>
                            <select multiple class="form-control @error('integrantes[]') is-invalid @enderror" name="integrantes[]" aria-label="Integrantes">
                                <option value="">Seleccione una opcion</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}" {{$proyecto->users->where('id',$usuario->id)->count() ? 'selected' : ''}}>{{$usuario->name}}</option>
                                @endforeach
                            </select>
                            @error('integrantes[]')
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
