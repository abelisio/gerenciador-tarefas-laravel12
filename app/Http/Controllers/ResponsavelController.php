<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public readonly Responsavel $responsavel;
    public function __construct()
    {
        $this->responsavel = new Responsavel();
    }

    public function index()
    {
        $responsavels = $this->responsavel->all();
        return view('responsavel', ['responsavel' => $responsavel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("responsavel");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'responsavel' => 'required'
        ]);

        responsavel::create($request->all());

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Responsavel $responsavel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsavel $responsavel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsavel $responsavel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsavel $responsavel)
    {
        //
    }
}