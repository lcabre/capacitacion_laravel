<?php

namespace App\Http\Controllers;

use App\Models\Dg;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        return view('pages.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $dgs = Dg::all();
        return view ('pages.users.edit', compact('user', 'dgs'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email:filter',
            'dg_id' => 'required|numeric|exists:dgs,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dg = Dg::find($request->dg_id);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dg()->associate($dg); //Cuando es 1 a N, se usa associate
        $user->save();

        return redirect()->route('user.edit', $id);
    }

}
