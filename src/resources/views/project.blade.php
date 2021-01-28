@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('users.attachproject') }}" method="post">
                        @csrf
                        {{--  @method('PUT') --}}
                        <label for="fname">Firstname:</label>
                        <input type="text" id="fname" name="fname">
                        <label for="cars">Choose a car:</label>
                        <select id="cars" name="project_id">
                            @foreach($projects as $project)
                                <option value={{ $project->id }}>{{ $project->nombre }}</option>
                            @endforeach
                        </select>
                        <label><strong>Select Category :</strong></label><br/>

                        <select class="form-control" name="cat[]" multiple="">

                            <option value="php">PHP</option>

                            <option value="react">React</option>

                            <option value="jquery">JQuery</option>

                            <option value="javascript">Javascript</option>

                            <option value="angular">Angular</option>

                            <option value="vue">Vue</option>

                        </select>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
