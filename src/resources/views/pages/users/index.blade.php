@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
{{--                <table id="tabla" class="table table-striped mt-5 bg-white p-3 rounded-sm">--}}
{{--                    <thead>--}}
{{--                        <th>id</th>--}}
{{--                        <th>nombre</th>--}}
{{--                        <th>apellido</th>--}}
{{--                        <th>acciones</th>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                        @foreach($users as $user)--}}
{{--                            <tr data-id="{{$user->id}}">--}}
{{--                                <td>{{$user->id}}</td>--}}
{{--                                <td>{{$user->profile->nombre}}</td>--}}
{{--                                <td>{{$user->profile->apellido}}</td>--}}
{{--                                <td><button class="btn btn-danger delete">Borrar</button></td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
                <div class="table_wrapper">
                    {{$dataTable->table(['class' => 'w-100'])}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{$dataTable->scripts()}}
    <script src="{{ mix('js/pages/users/index.js') }}"></script>
@endpush
