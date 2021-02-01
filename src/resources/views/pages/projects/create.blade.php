@extends('layouts.app')

@section('content')
<div class="container">
    <div id="test" class="row justify-content-center">
        <h1>Creating a project</h1>
        <p></p>
    </div>

    <div name="create-project">
            <form action="{{ route('project.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Project's name</label>
                    <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="project" aria-label="Project's name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input value="{{old('deadline')}}" name="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" aria-label="Deadline">
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
    </div>
</div>

@endsection


