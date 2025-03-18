@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes da Tarefa</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tarefa->titulo }}</h5>
            <p class="card-text"><strong>Descrição:</strong> {{ $tarefa->descricao }}</p>
            <p class="card-text"><strong>Prioridade:</strong> {{ $tarefa->prioridade }}</p>
            <p class="card-text"><strong>Data de Entrega:</strong> {{ $tarefa->deadline->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-primary">Editar</a>

        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>
</div>
@endsection
