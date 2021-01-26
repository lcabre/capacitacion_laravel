@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $perfil->id }}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$perfil->nombre}}" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$perfil->apellido}}" disabled>
                        </div>
                        <button type="button" class="btn btn-outline-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
