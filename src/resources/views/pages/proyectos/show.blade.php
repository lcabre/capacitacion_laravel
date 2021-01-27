@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombre del proyecto</label>
                            <input name="nombre" type="text" class="form-control" placeholder="Nasa Rocket" aria-label="Nombre del proyecto" value="{{$proyecto->nombre}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="fecha_entrega">Fecha de entrega</label>
                            <input name="fecha_entrega" type="date" class="form-control" aria-label="Fecha de entrega" value="{{$proyecto->fecha_entrega}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="integrantes">Integrantes</label>
                            <select multiple class="form-control" name="integrantes[]" aria-label="Integrantes" disabled>
                                @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}" {{$proyecto->users->where('id',$usuario->id)->count() ? 'selected' : ''}}>{{$usuario->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{route('proyectos.edit', $proyecto->id)}}" class="btn btn-primary" role="button">Editar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
