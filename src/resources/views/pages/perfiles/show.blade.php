@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form action="{{route('perfil.edit', $perfil->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{$perfil->nombre}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input name="apellido" type="text" class="form-control" id="apellido" value="{{$perfil->apellido}}" disabled>
                        </div>
                        <a href="{{route('perfil.edit', $perfil->id)}}" class="btn btn-primary" role="button">Editar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
