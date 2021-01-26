@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form action="{{ route('perfil.update', $perfil->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <input name="nombre" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$perfil->nombre}}">
                        </div>
                        <div class="form-group mb-3">
                            <input name="apellido" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$perfil->apellido}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
