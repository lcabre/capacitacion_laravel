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
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($perfiles as $perfil)
                        <tr>
                            <th scope="row">{{$perfil->id}}</th>
                            <td>{{$perfil->nombre}}</td>
                            <td>{{$perfil->apellido}}</td>
                            <td>{{$perfil->created_at}}</td>
                            <td>{{$perfil->updated_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>



{{--                {{ $perfiles->links() }} PAGINACION--}}


            </div>
        </div>
    </div>
@endsection
