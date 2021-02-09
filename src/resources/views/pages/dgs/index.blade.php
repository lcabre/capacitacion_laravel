@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('dgs.create')}}" class="btn btn-primary" role="button">Crear nueva DG</a>
                <br>
                <br>
                <table id='dg-table' class="table table-striped text-center">
                    <thead>
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
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
                                <div class="dropdown-menu">
                                    <a href="{{route('dgs.edit', $dg->id)}}" class="dropdown-item">Editar</a>
                                    <a href="{{route('dgs.show', $dg->id)}}" class="dropdown-item">Informacion</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <form action="{{route('dgs.destroy', $dg->id)}}" method="POST">
                                        <button type="submit" class="dropdown-item delete">Eliminar</button>
                                    </form>
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
@push('scripts')
    <script src="{{ mix('js/pages/dgs/index.js') }}"></script>
@endpush
