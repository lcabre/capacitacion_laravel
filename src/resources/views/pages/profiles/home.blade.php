@extends('layouts.app')
@section('content')

    <div class="container">
        <div>
            <div id="test" class="row justify-content-center">
                    <h1>PROFILE</h1>
                    <p></p>
            </div>

            <div name="update-user">
                <form action="{{ route('profile.update',auth()->user()->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <!-- old('name') // ? old('name') : $profile->name -->
                        <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="John" aria-label="Name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <!-- old('lastname') // ? old('lastname') : $profile->lastname -->
                        <input value="{{old('lastname')}}" name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Cena" aria-label="Lastname">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                        <h2>You're part of the following projects:</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">
                                    Id
                                </th>
                                <th scope="col">Project</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Creation date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->deadline }}</td>
                                    <td>{{ $project->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    <div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
@endsection
