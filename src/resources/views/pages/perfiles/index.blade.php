@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('perfiles.create')}}" class="btn btn-primary" role="button">Crear nuevo Perfil</a>
                <br>
                <br>
                <table class="table table-striped text-center"><thead>
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
                            <td>{{$perfil->id}}</td>
                            <td>{{$perfil->nombre}}</td>
                            <td>{{$perfil->apellido}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('perfiles.edit', $perfil->id)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                    <a href="{{route('perfiles.show', $perfil->id)}}" class="btn btn-outline-info btn-sm">Info</a>
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
