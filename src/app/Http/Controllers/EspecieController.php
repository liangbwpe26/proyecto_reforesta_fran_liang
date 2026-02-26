<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEspecieRequest;
use App\Http\Requests\UpdateEspecieRequest;
use App\Models\Especie;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especies = \App\Models\Especie::all();
        return view('especies.index', compact('especies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEspecieRequest $request) {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('especies', 'public');
        }

        Especie::create($data);
        return redirect()->route('especies.index')->with('success', 'Especie registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Especie $especie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especie $especie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEspecieRequest $request, Especie $especie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especie $especie)
    {
        //
    }
}
