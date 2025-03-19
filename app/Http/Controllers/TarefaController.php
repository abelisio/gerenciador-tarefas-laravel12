<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;


class TarefaController extends Controller
{

    public readonly Tarefa $tarefa;
    public function __construct()
    {
        $this->tarefa = new Tarefa();
    }
    public function index(Request $request)
    {
        $query = Tarefa::query();

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if ($request->filled('responsavel')) {
            $query->where('responsavel', $request->responsavel);
        }

        if ($request->filled('prioridade')) {
            $query->where('prioridade', $request->prioridade);
        }

        if ($request->filled('deadline')) {
            $query->where('deadline', [$request->deadline]);
        }

        $tarefas = $query->orderBy('id', 'desc')->paginate(10);

        return view('tarefas.listar', compact('tarefas'));
    }


    public function create()
    {
        return view("tarefas.create");
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'titulo'      => 'required|string|max:255',
            'descricao'   => 'required|string',
            'responsavel' => 'required|string|max:100',
            'prioridade'  => 'required|in:Baixa,Média,Alta',
            'deadline'    => 'required|date|after_or_equal:today',
            'situacao' => 'Em andamento', // Definindo como padrão
        ], [
            'titulo.required'      => 'O campo título é obrigatório.',
            'descricao.required'   => 'O campo descrição é obrigatório.',
            'responsavel.required' => 'O campo responsável é obrigatório.',
            'prioridade.required'  => 'O campo prioridade é obrigatório.',
            'deadline.required'    => 'O campo deadline é obrigatório.',
            'deadline.date'        => 'A deadline deve ser uma data válida.',
            'deadline.after_or_equal' => 'A deadline não pode ser no passado.'
        ]);

        Tarefa::create($validated);

        return redirect()->route('index')->with('success', 'Tarefa criada com sucesso!');
    }


    public function show(Tarefa $tarefaid)
    {

        return view('tarefas.show', compact('tarefa'));
    }


    public function edit($id)
    {

        $tarefa = $this->tarefa->find($id);
        return view('tarefas.edit', compact('tarefa'));
    }


    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso.');
    }


    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id)->delete();

        return redirect()->route('tarefas.index');
    }
    public function atualizarStatus(Tarefa $id)
    {
        $novoStatus = $id->status === 'Em andamento' ? 'Concluída' : 'Em andamento';
        $id->update(['status' => $novoStatus]);

        return redirect()->route('tarefas.index')->with('success', 'Status atualizado com sucesso!');
    }
}
