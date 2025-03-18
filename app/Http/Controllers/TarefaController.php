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
        $query = Tarefa::query();

        // Filtro por Número da Tarefa (ID exato)
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        // Filtro por Título (busca parcial)
        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        // Filtro por Responsável (Select)
        if ($request->filled('responsavel')) {
            $query->where('responsavel', $request->responsavel);
        }

        // Filtro por Situação (Select)
        if ($request->filled('prioridade')) {
            $query->where('prioridade', $request->prioridade);
        }

        // Filtro por intervalo de datas (Deadline)
        if ($request->filled('deadline')) {
            $query->where('deadline', [$request->deadline]);
        }

        // Paginação (10 registros por página)
        $tarefas = $query->orderBy('id', 'desc')->paginate(10);

        return view('listar', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tarefas.create");
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

        $validated = $request->validate([
            'titulo'      => 'required|string|max:255',
            'descricao'   => 'required|string',
            'responsavel' => 'required|string|max:100',
            'prioridade'  => 'required|in:Baixa,Média,Alta',
            'deadline'    => 'required|date|after_or_equal:today',
        ], [
            'titulo.required'      => 'O campo título é obrigatório.',
            'descricao.required'   => 'O campo descrição é obrigatório.',
            'responsavel.required' => 'O campo responsável é obrigatório.',
            'prioridade.required'  => 'O campo prioridade é obrigatório.',
            'deadline.required'    => 'O campo deadline é obrigatório.',
            'deadline.date'        => 'A deadline deve ser uma data válida.',
            'deadline.after_or_equal' => 'A deadline não pode ser no passado.'
        ]);

        // Criar a tarefa apenas com os dados validados
        Tarefa::create($validated);

        return redirect()->route('index')->with('success', 'Tarefa criada com sucesso!');
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
    public function edit($id)
    {

        $tarefa = $this->tarefa->find($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {


        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}