<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProyectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $proyects = Proyect::with('users')->paginate(5);
        //$proyectos = Proyecto::withCount('users')->paginate(5); //Trae solo los integrantes
        return view('pages.proyects.index', compact('proyects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::all();
        return view('pages.proyects.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'integrantes' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $proyect = new Proyect();
        $proyect->nombre = $request->nombre;
        $proyect->fecha_entrega = $request->fecha_entrega;
        $proyect->save();
        $proyect->users()->sync($request->integrantes);

        return redirect()->route('proyects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $proyect = Proyect::findOrFail($id);
        $users = User::all();

        return view('pages.proyects.show', compact('proyect', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $users = User::all();
        $proyect = Proyect::findOrFail($id);
        return view('pages.proyects.edit', compact('proyect', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'fecha_entrega' => 'required',
            'integrantes' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $proyect = Proyect::find($id);
        $proyect->nombre = $request->nombre;
        $proyect->fecha_entrega = $request->fecha_entrega;
        $proyect->save();
        $proyect->users()->sync($request->integrantes);

        return redirect()->route('proyects.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $proyect = Proyect::findOrFail($id);
        $proyect->users()->detach();
        $proyect->delete();
        return redirect()->route('proyects.index');
    }
}
