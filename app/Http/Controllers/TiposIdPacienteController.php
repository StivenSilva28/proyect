<?php

namespace App\Http\Controllers;

use App\Models\TiposIdPaciente;
use Illuminate\Http\Request;

/**
 * Class TiposIdPacienteController
 * @package App\Http\Controllers
 */
class TiposIdPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposIdPacientes = TiposIdPaciente::paginate();

        return view('tipos-id-paciente.index', compact('tiposIdPacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposIdPacientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposIdPaciente = new TiposIdPaciente();
        return view('tipos-id-paciente.create', compact('tiposIdPaciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TiposIdPaciente::$rules);

        $tiposIdPaciente = TiposIdPaciente::create($request->all());

        return redirect()->route('tipos-id-pacientes.index')
            ->with('success', 'TiposIdPaciente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposIdPaciente = TiposIdPaciente::find($id);

        return view('tipos-id-paciente.show', compact('tiposIdPaciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposIdPaciente = TiposIdPaciente::find($id);

        return view('tipos-id-paciente.edit', compact('tiposIdPaciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TiposIdPaciente $tiposIdPaciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposIdPaciente $tiposIdPaciente)
    {
        request()->validate(TiposIdPaciente::$rules);

        $tiposIdPaciente->update($request->all());

        return redirect()->route('tipos-id-pacientes.index')
            ->with('success', 'TiposIdPaciente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tiposIdPaciente = TiposIdPaciente::find($id)->delete();

        return redirect()->route('tipos-id-pacientes.index')
            ->with('success', 'TiposIdPaciente deleted successfully');
    }
}
