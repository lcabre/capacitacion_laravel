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
    public function __construct()
    {
//        $this->middleware('pepe',['only'=>['edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('projects')->get(); //Eloquent
//        dd($users);
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
        $user = User::with('projects')->findOrFail($id); //Eloquent
//        dd($user->projects);
        $profile = Profile::where('user_id',$id)->first();
        $profile = ($profile) ? $profile : new Profile();

        $roles = Role::all();
        $projects = Project::all();

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
            'name' => 'required|string|',
            'lastname' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

//        $profile = Profile::where('user_id',$id)->count() > 0 ? Profile::where('user_id',$id)->first() : new Profile();
//        $profile->user_id = $id;
//        $profile->name = $request->name;
//        $profile->lastname = $request->lastname;
//
//        $profile->save();
//
//        $user->roles()->sync($request->roles);
//        $user->projects()->sync($request->projects);
//        $user->save();

        //        $profile = Profile::where('user_id',$id)->count() > 0 ? Profile::where('user_id',$id)->first() : new Profile();

        if(!$user->profile){
            $profile = new Profile();
            $profile->name = $request->name;
            $profile->lastname = $request->lastname;
            $profile->user()->associate($user);
            $profile->save();
//        $user->profile()->save($profile);
        }else{
            $user->profile->name = $request->name;
            $user->profile->lastname = $request->lastname;
            $user->profile->save();
        }

        $user->roles()->sync($request->roles);
        $user->projects()->sync($request->projects);

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
