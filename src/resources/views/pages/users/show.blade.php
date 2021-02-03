@extends('layouts.app')

@section('content')
    <div class="container">
    </div>
    <div class="pepe">
    </div>
    <div class="container">
        <div class="pepe">
        </div>
    </div>
    <div class="container pepe">
        <div class="row justify-content-center">
            <form action="{{ route('event.ajaxcall') }}" method="post" id="pepe">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input name="check" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="button" class="btn btn-primary" id="enviar">Submit</button>
            </form>
            <div class="alert alert-info" id="imprimir_texto"></div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="{{ mix('js/pages/users/show.js') }}"></script>
@endpush
