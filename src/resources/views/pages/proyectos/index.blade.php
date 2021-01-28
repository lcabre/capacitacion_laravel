@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('proyectos.create')}}" class="btn btn-primary" role="button">Crear nuevo proyecto</a>
                <br>
                <br>
                <table class="table table-striped text-center"><thead>
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
                            <td>{{$proyecto->users->count()}}</td>
                            <td>
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
                                <div class="dropdown-menu">
                                    <a href="{{route('proyectos.edit', $proyecto->id)}}" class="dropdown-item">Editar</a>
                                    <a href="{{route('proyectos.show', $proyecto->id)}}" class="dropdown-item">Informacion</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <form action="{{route('proyectos.destroy', $proyecto->id)}}" method="POST" class="btn-group">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$proyectos->links()}}
            </div>
        </div>
    </div>
@endsection
