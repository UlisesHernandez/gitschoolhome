<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\Request;

class DreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dreams.index2');
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['required','min:3','max:255']
        ]);      ;
        $request->user()->dreams()->create($validated);
//        index hace referencia al ruta del contoller (carpeta)dreams.(metodo)index
        return to_route('dreams.index')
            ->with('status', __('Dream created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Dream $dream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dream $dream)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dream $dream)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dream $dream)
    {
        //
    }
}
