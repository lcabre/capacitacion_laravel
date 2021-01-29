@extends('layouts.app')

@section('content')
    <div class="container pepe">
        <div class="row justify-content-center">
                <div class="col-md-12">
                        @csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fecha de Creacion</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="{{ route('users.update', $user->id ) }}">{{ $user->id }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
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
