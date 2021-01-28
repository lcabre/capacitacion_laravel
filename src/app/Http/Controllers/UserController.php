<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id); //Eloquent
//        $user2 = DB::table('users')
//            ->selectRaw('count(*) as user')
//            ->groupBy('id')
//            ->get();//query builder

//        dd($user);

        $roles = Role::all();

        $projects = Project::all();

        return view('pages.users.show', compact('user', 'roles', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //aca tiene que llegar todos los projectos asociados, su role y su perfil
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

    public function attachProject(Request $request){
        return 'hola';
        //dd($request->all());

        $user = Auth::user();
        //dd($id);
        //dd($request);
        //dd($request->all()['carlist']);
        //dd($request->all());
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'projects.*' => 'required|numeric|exists:projects,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        //dd($validator->fails());
        //$user = User::find($id);
        $projects = Project::find($request->projects);
        //ddd($projects);

//        $project->nombre = 'sadasdas';
//        $project->save();
        //$project = new Project();
        //$project->delete();
        //ELIMINAR TODOS LOS USER_PROJECTS DEL USER
        $projectsValid = Project::all();
        $user->projects()->detach($projectsValid);
        $user->projects()->attach($projects);
        $user->save();

        return redirect()->route('home');
    }
}
