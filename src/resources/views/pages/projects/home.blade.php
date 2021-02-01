@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center">

            <div id="test" class="row justify-content-center">
                <h1>PROJECTS</h1>
                <p></p>
            </div>

            <div class="card-header" >{{ __('All Projects') }}</div>

{{--            @dd($projects->count())--}}

            @if($projects->count())
                <div name="project-cards" class="card">
                    @foreach($projects as $project)
                        <a href="#" class="btn btn-link" role="button">{{ $project->name }}</a>  -
                        Deadline: {{ $project->deadline }}<br>
                    @endforeach
                </div>
                <br>
                <div name="create-project-button" class="row justify-content-center">
                    <a href="{{ route('project.create') }}" class="btn btn-primary" role="button"> Create a new
                        project </a>
                </div>
                <br>
                <br>
                <div name="select-project-delete">
                    <form action="{{route('project.destroy', $project->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <div class="form-group">
                            <p><strong>Delete an existing project</strong></p>

                            <select class="form-control" name="project" id="project">
                                <option>Select a project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div name="delete-project-button" class="form-group">
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </div>
                    </form>
                </div>
            @else
                <div name="no-projects">
                    <div class="card-header" >There are no projects available at the moment :(')</div>
                    <p>feel free to create one :)</p>
                    <div class="row justify-content-center">
                        <a href="{{ route('project.create') }}" class="btn btn-primary" role="button"> Create a new project </a>
                    </div>
                </div>
            @endif



        </div>
    </div>
</div>
@endsection

