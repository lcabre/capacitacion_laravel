<?php

namespace App\Http\Controllers;

use App\Models\Dg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DgController extends Controller
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
        $dgs = Dg::paginate(5);
        return view('pages.dgs.index', compact('dgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.dgs.create');
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
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dg = new Dg();
        $dg->nombre = $request->nombre;
        $dg->save();

        return redirect()->route('dgs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $dg = Dg::findOrFail($id);
        return view('pages.dgs.show', compact('dg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $dg = Dg::findOrFail($id);
        return view('pages.dgs.edit', compact('dg'));
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
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dg = DG::find($id);
        $dg->nombre = $request->nombre;
        $dg->save();

        return redirect()->route('dgs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dg = Dg::findOrFail($id);
        $users = $dg->users()->get();
        foreach($users as $user){
            $user->dg()->dissociate();
            $user->save();
        }
        Dg::destroy($id);
        return response()->json(['message' => 'Deleted']);
//        return redirect()->route('dgs.index');
    }
}
