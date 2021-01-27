@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Editar DG</h3>
                <div class="container-sm">
                    <form action="{{ route('dgs.update', $dg->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{$dg->nombre}}">
                            @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
