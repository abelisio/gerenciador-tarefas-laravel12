<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public readonly Tarefa $tarefa;
    public function __construct()
    {
        $this->tarefa = new Tarefa();
    }
    public function index(Request $request)
    {
        $search = request('search');
        if ($search) {
            $tarefas = Tarefa::where([
                ['titulo', 'like', '%' . "$search" . '%']
            ])->get();
        } else {
            $tarefas = Tarefa::all();
        }
        return view('listar', ['tarefas' => $tarefas, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'responsavel' => 'required',
            'prioridade' => 'required',
            'deadline' => 'required'
        ]);

        Tarefa::create($request->all());

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return view('listar');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
