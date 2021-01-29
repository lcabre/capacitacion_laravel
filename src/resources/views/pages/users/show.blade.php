@extends('layouts.app')

@section('content')
    <div class="container pepe">
        <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="{{ route('users.update',$user->id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" value="{{old('name') ? old('name'): $profile->name}}" class="form-control @error('name') is-invalid @enderror" aria-label="Nombre">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Apellido</label>
                                <input type="text" name="lastname" value="{{old('lastname') ? old('lastname'): $profile->lastname}}"class="form-control @error('lastname') is-invalid @enderror" aria-label="Apellido">
                                @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><strong>Select Roles :</strong></label><br/>
                                <select class="form-control @error('roles') is-invalid @enderror"  multiple data-live-search="true" name="roles[]">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{(collect(old('roles'))->contains($role->id)) ? 'selected':''}} {{$role->user_id && old('roles') == NULL ? 'selected':''}}>{{ $role->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label><strong>Select Projects :</strong></label><br/>
                                <select class="form-control @error('projects') is-invalid @enderror" multiple data-live-search="true" name="projects[]">
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}" {{(collect(old('projects'))->contains($project->id)) ? 'selected':''}} {{$project->user_id && old('projects') == NULL ? 'selected':''}} >{{ $project->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('projects')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
