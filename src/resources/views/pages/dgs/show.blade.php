@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="container-sm">
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="{{$dg->nombre}}" disabled>
                        </div>
                        <a href="{{route('dgs.edit', $dg->id)}}" class="btn btn-primary" role="button">Editar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
