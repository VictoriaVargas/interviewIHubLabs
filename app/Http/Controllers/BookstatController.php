<?php

namespace App\Http\Controllers;

use App\Models\Bookstat;
use Illuminate\Http\Request;

/**
 * Class BookstatController
 * @package App\Http\Controllers
 */
class BookstatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookstats = Bookstat::paginate();

        return view('bookstat.index', compact('bookstats'))
            ->with('i', (request()->input('page', 1) - 1) * $bookstats->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookstat = new Bookstat();
        return view('bookstat.create', compact('bookstat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bookstat::$rules);

        $bookstat = Bookstat::create($request->all());

        return redirect()->route('bookstats.index')
            ->with('success', 'Bookstat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookstat = Bookstat::find($id);

        return view('bookstat.show', compact('bookstat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookstat = Bookstat::find($id);

        return view('bookstat.edit', compact('bookstat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bookstat $bookstat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookstat $bookstat)
    {
        request()->validate(Bookstat::$rules);

        $bookstat->update($request->all());

        return redirect()->route('bookstats.index')
            ->with('success', 'Bookstat updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookstat = Bookstat::find($id)->delete();

        return redirect()->route('bookstats.index')
            ->with('success', 'Bookstat deleted successfully');
    }
}
