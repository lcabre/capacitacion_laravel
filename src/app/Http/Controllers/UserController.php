<?php

namespace App\Http\Controllers;

use App\Models\Profile;
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
        $users = User::all(); //Eloquent

        return view('pages.users.index', compact('users'));
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
        $profile = Profile::where('user_id',$id)->first();
        $profile = ($profile) ? $profile : new Profile();

        $roles = Role::select('roles.nombre','roles.id', 'user_role.user_id')
            ->leftjoin('user_role',function ($join) use ($id){
                $join->on('roles.id', '=', 'user_role.role_id')
                    ->where('user_role.user_id', $id);
            })->get();

        $projects = Project::select('projects.nombre','projects.id', 'user_project.user_id')
            ->leftjoin('user_project',function ($join) use ($id){
                $join->on('projects.id', '=', 'user_project.project_id')
                    ->where('user_project.user_id', $id);
            })->get();

        return view('pages.users.show', compact('user', 'roles', 'projects', 'profile'));
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
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'projects.*' => 'required|numeric|exists:projects,id',
            'roles.*' => 'required|numeric|exists:roles,id',
            'name' => 'required|string',
            'lastname' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $profile = Profile::where('user_id',$id)->count() > 0 ? Profile::where('user_id',$id)->first() : new Profile();
        $profile->user_id = $id;
        $profile->name = $request->name;
        $profile->lastname = $request->lastname;

        $profile->save();

        $user->roles()->sync($request->roles);
        $user->projects()->sync($request->projects);
        $user->save();

        return redirect()->route('home');
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
        return redirect()->route('home');
    }
}
