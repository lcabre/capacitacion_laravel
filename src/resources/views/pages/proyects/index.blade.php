@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('proyects.create')}}" class="btn btn-primary" role="button">Crear nuevo proyecto</a>
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

                    @foreach($proyects as $proyect)
                        <tr>
                            <td>{{$proyect->id}}</td>
                            <td>{{$proyect->nombre}}</td>
                            <td>{{$proyect->fecha_entrega}}</td>
                            <td>{{$proyect->users->implode('name', ', ')}}</td>
                            <td>{{$proyect->users->count()}}</td>
                            <td>
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
                                <div class="dropdown-menu">
                                    <a href="{{route('proyects.edit', $proyect->id)}}" class="dropdown-item">Editar</a>
                                    <a href="{{route('proyects.show', $proyect->id)}}" class="dropdown-item">Informacion</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <form action="{{route('proyects.destroy', $proyect->id)}}" method="POST" class="btn-group">
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
                {{$proyects->links()}}
            </div>
        </div>
    </div>
@endsection
