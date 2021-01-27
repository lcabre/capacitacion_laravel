@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('proyectos.create')}}" class="btn btn-primary" role="button">Crear nuevo proyecto</a>
                <br>
                <table class="table table-striped"><thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha entrega</th>
                        <th scope="col">Integrantes</th>
                        <th scope="col">Total de integrantes</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($proyectos as $proyecto)
                        <tr>
                            <td>{{$proyecto->id}}</td>
                            <td>{{$proyecto->nombre}}</td>
                            <td>{{$proyecto->fecha_entrega}}</td>
                            <td>{{$proyecto->users->implode('name', ', ')}}</td>
                            <td></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('proyectos.edit', $proyecto->id)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                    <a href="{{route('proyectos.show', $proyecto->id)}}" class="btn btn-outline-info btn-sm">Info</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Eliminar</a>
                                </div>
                            </td>
                            <td></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$proyectos->links()}}
            </div>
        </div>
    </div>
@endsection
