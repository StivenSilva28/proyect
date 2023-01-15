<?php

namespace App\Http\Controllers;

use App\Models\Tiposexo;
use Illuminate\Http\Request;

/**
 * Class TiposexoController
 * @package App\Http\Controllers
 */
class TiposexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposexos = Tiposexo::paginate();

        return view('tiposexo.index', compact('tiposexos'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposexos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposexo = new Tiposexo();
        return view('tiposexo.create', compact('tiposexo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tiposexo::$rules);

        $tiposexo = Tiposexo::create($request->all());

        return redirect()->route('tiposexos.index')
            ->with('success', 'Tiposexo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposexo = Tiposexo::find($id);

        return view('tiposexo.show', compact('tiposexo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposexo = Tiposexo::find($id);

        return view('tiposexo.edit', compact('tiposexo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tiposexo $tiposexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiposexo $tiposexo)
    {
        request()->validate(Tiposexo::$rules);

        $tiposexo->update($request->all());

        return redirect()->route('tiposexos.index')
            ->with('success', 'Tiposexo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tiposexo = Tiposexo::find($id)->delete();

        return redirect()->route('tiposexos.index')
            ->with('success', 'Tiposexo deleted successfully');
    }
}
