<?php

namespace App\Http\Controllers;

use App\Models\Zonaresidencia;
use Illuminate\Http\Request;

/**
 * Class ZonaresidenciaController
 * @package App\Http\Controllers
 */
class ZonaresidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonaresidencias = Zonaresidencia::paginate();

        return view('zonaresidencia.index', compact('zonaresidencias'))
            ->with('i', (request()->input('page', 1) - 1) * $zonaresidencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zonaresidencia = new Zonaresidencia();
        return view('zonaresidencia.create', compact('zonaresidencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Zonaresidencia::$rules);

        $zonaresidencia = Zonaresidencia::create($request->all());

        return redirect()->route('zonaresidencias.index')
            ->with('success', 'Zonaresidencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zonaresidencia = Zonaresidencia::find($id);

        return view('zonaresidencia.show', compact('zonaresidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zonaresidencia = Zonaresidencia::find($id);

        return view('zonaresidencia.edit', compact('zonaresidencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Zonaresidencia $zonaresidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zonaresidencia $zonaresidencia)
    {
        request()->validate(Zonaresidencia::$rules);

        $zonaresidencia->update($request->all());

        return redirect()->route('zonaresidencias.index')
            ->with('success', 'Zonaresidencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $zonaresidencia = Zonaresidencia::find($id)->delete();

        return redirect()->route('zonaresidencias.index')
            ->with('success', 'Zonaresidencia deleted successfully');
    }
}
