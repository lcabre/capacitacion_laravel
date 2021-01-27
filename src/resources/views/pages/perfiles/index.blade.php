@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('perfil.create')}}" class="btn btn-primary" role="button">Crear nuevo Perfil</a>
                <br>
                <table class="table table-striped"><thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($perfiles as $perfil)
                        <tr>
                            <th scope="row">{{$perfil->id}}</th>
                            <td>{{$perfil->nombre}}</td>
                            <td>{{$perfil->apellido}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('perfil.edit', $perfil->id)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                    <a href="{{route('perfil.show', $perfil->id)}}" class="btn btn-outline-info btn-sm">Info</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>



{{--                {{ $perfiles->links() }} PAGINACION--}}


            </div>
        </div>
    </div>
@endsection
