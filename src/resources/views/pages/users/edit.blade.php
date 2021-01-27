@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center">Editar Perfil</h3>
                <div class="container-sm">
                    <form action="{{ route('user.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dg_id">Direccion General</label>
                            <select name="dg_id" class="form-control" id="dg_id">
                                <option selected value="null">Seleccione una opcion</option>
                                @foreach($dgs as $dg)
                                    <option value="{{$dg->id}}" {{$dg->id == $user->dg_id ? 'selected' : ''}}>{{$dg->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
