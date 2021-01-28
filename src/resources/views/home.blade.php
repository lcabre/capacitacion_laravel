@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Bienvenido {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
@endsection
