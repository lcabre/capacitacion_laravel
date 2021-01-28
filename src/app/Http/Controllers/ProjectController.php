<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$projects = Project::all();
        //eloquent
        $projects = Project::select('id','nombre')->get();
        //dd($projects->first()->nombre);
        //dd($projects->toArray());
        /*
        $projects = DB::table('projects')
            ->select('id AS project_id', 'nombre')
            ->get();
        */
        //dd($projects[0]->name);
        $pp2 = ['testeando', 'testeando2', 'testeando3'];
        $pp = 'testeando';
        //dd($pp);
        //https://laravel.com/docs/8.x/views

        return view('project')
            ->with('name', 'Victoria')
            ->with('occupations', $pp2)
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        ddd($request);
        $input = $request->all();
        $input['project'] = bcrypt($input['project']);

        dd($input['project']);
        //
        return redirect()->route('home');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testput(Request $request)
    {
        //
        dd($request);
    }


    public function attachProject(Request $request){
        $user = Auth::user();
        //dd($id);
        //dd($request);
        //dd($request->all()['carlist']);
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|exists:projects,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        //$user = User::find($id);
        $project = Project::find($request->id);


//        $project->nombre = 'sadasdas';
//        $project->save();
        $project = new Project();
        $project->delete();


        $user->projects()->attach($project);
        $user->save();

        return redirect()->route('home');
    }
}
