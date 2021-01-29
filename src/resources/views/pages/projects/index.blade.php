@extends('layouts.app')

@section('content')
    <div class="container pepe">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            Id
                        </th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha de Entrega</th>
                        <th scope="col">Fecha de Creación</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->nombre }}</td>
                                <td>{{ $project->fecha_entrega }}</td>
                                <td>{{ $project->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

