<?php

namespace App\Http\Controllers;

use App\Models\Tiposidpaciente;
use Illuminate\Http\Request;

/**
 * Class TiposidpacienteController
 * @package App\Http\Controllers
 */
class TiposidpacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposidpacientes = Tiposidpaciente::paginate();

        return view('tiposidpaciente.index', compact('tiposidpacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposidpacientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposidpaciente = new Tiposidpaciente();
        return view('tiposidpaciente.create', compact('tiposidpaciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tiposidpaciente::$rules);

        $tiposidpaciente = Tiposidpaciente::create($request->all());

        return redirect()->route('tiposidpacientes.index')
            ->with('success', 'Tiposidpaciente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposidpaciente = Tiposidpaciente::find($id);

        return view('tiposidpaciente.show', compact('tiposidpaciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposidpaciente = Tiposidpaciente::find($id);

        return view('tiposidpaciente.edit', compact('tiposidpaciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tiposidpaciente $tiposidpaciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiposidpaciente $tiposidpaciente)
    {
        request()->validate(Tiposidpaciente::$rules);

        $tiposidpaciente->update($request->all());

        return redirect()->route('tiposidpacientes.index')
            ->with('success', 'Tiposidpaciente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tiposidpaciente = Tiposidpaciente::find($id)->delete();

        return redirect()->route('tiposidpacientes.index')
            ->with('success', 'Tiposidpaciente deleted successfully');
    }
}
