@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{route('proyects.create')}}" class="btn btn-primary" role="button">Crear nuevo proyecto</a>
                <div class="table_wrapper pt-3">
                    <div class="table table-striped">
                        {{$dataTable->table(['class' => 'w-100'])}}
                    </div>
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
    <script src="{{ mix('js/pages/proyects/index.js') }}"></script>
@endpush
