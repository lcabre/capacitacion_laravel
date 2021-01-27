<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::with('users')->paginate(5);
        return view('pages.proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        return view('pages.proyectos.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'fecha_entrega' => 'required',
            'integrates' => 'requiered|exists:users,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre;
        $proyecto->fecha_entrega = $request->fecha_entrega;
        $proyecto->save();
        $proyecto->users()->sync($request->integrantes);

        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $usuarios = $proyecto->users;

        return view('pages.proyectos.show', compact('proyecto', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::all();
        $proyecto = Proyecto::findOrFail($id);
        return view('pages.proyectos.edit', compact('proyecto', 'usuarios'));
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
            'nombre' => 'required|string|max:255',
            'fecha_entrega' => 'required',
            'integrates' => 'requiered|exists:users,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->nombre;
        $proyecto->fecha_entrega = $request->fecha_entrega;
        $proyecto->save();
        $proyecto->users()->sync($request->integrantes);

        return redirect()->route('proyectos.show', $id);
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
}
