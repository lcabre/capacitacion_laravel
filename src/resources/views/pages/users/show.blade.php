@extends('layouts.app')

@section('content')
    <div class="container pepe">
        <div class="row justify-content-center">
                <div class="col-md-12">
                    <form action="{{ route('users.attachrole') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="card">
                            {{ $user->email }}
                        </div>
                        <div class="card">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">roles</label>
                                <select multiple class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="exampleFormControlSelect2">
                                    <option value="">Seleccione una option</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{old('role_id') == $role->id ? 'selected':''}}>{{ $role->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">text</label>
                                <input type="text" name="texto" value="{{old('texto')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
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

@endpush