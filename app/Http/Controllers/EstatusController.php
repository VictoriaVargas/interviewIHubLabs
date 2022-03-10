<?php

namespace App\Http\Controllers;

use App\Models\Estatus;
use Illuminate\Http\Request;

/**
 * Class EstatusController
 * @package App\Http\Controllers
 */
class EstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estatuses = Estatus::paginate();

        return view('estatus.index', compact('estatuses'))
            ->with('i', (request()->input('page', 1) - 1) * $estatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estatus = new Estatus();
        return view('estatus.create', compact('estatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estatus::$rules);

        $estatus = Estatus::create($request->all());

        return redirect()->route('estatuses.index')
            ->with('success', 'Estatus created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estatus = Estatus::find($id);

        return view('estatus.show', compact('estatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estatus = Estatus::find($id);

        return view('estatus.edit', compact('estatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estatus $estatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estatus $estatus)
    {
        request()->validate(Estatus::$rules);

        $estatus->update($request->all());

        return redirect()->route('estatuses.index')
            ->with('success', 'Estatus updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estatus = Estatus::find($id)->delete();

        return redirect()->route('estatuses.index')
            ->with('success', 'Estatus deleted successfully');
    }
}
