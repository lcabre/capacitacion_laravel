@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('dg.create')}}" class="btn btn-primary" role="button">Crear nueva DG</a>
                <br>
                <br>
                <table class="table table-striped text-center"><thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($dgs as $dg)
                        <tr>
                            <td>{{$dg->id}}</td>
                            <td>{{$dg->nombre}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('dg.edit', $dg->id)}}" class="btn btn-outline-primary btn-sm">Editar</a>
                                    <a href="{{route('dg.show', $dg->id)}}" class="btn btn-outline-info btn-sm">Info</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$dgs->links()}}
            </div>
        </div>
    </div>
@endsection
