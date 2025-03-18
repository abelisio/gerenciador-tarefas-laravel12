@extends('layout')

@section('content')
<div class="row mb-2">
    <div class="col-md-18">
      <div class="row g-2 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #edeff0;">Editar Tarefa</strong>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('tarefas.update', ['tarefa'=> $tarefa->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
  <div class="mb-3">
    <label  for="" class=" form-label">Título</label>
    <input class="form-control " type="text" id="titulo" name="titulo" value="{{ $tarefa->titulo }}" require>
  </div>
  <div class="mb-3">
    <label  for="" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao', $tarefa->descricao) }}</textarea>
  </div>

<div class="row g-2">
  <div class="col-md">
<div class="mb-3">
            <label class="form-label">Responsável</label>
            <select name="responsavel" class="form-control">
                <option value="Dath Vader" {{ $tarefa->responsavel == 'Dath Vader' ? 'selected' : '' }}>Dath Vader</option>
                <option value="Luck Skywalker" {{ $tarefa->responsavel == 'Luck Skywalker' ? 'selected' : '' }}>Luck Skywalker</option>
                <option value="Leia Organa" {{ $tarefa->responsavel == 'Leia Organa' ? 'selected' : '' }}>Leia Organa</option>
                <option value="Han Solo" {{ $tarefa->responsavel == 'Han Solo' ? 'selected' : '' }}>Han Solo</option>
                <option value="Yoda" {{ $tarefa->responsavel == 'Yoda' ? 'selected' : '' }}>Yoda</option>
            </select>
        </div>
 <div class="col-md">
    <div class="form-floating">
<div class="mb-3">
    <label for="prioridade" class="form-label">Prioridade</label>
    <select class="form-select form-select-lg" id="prioridade" name="prioridade" required>
        <option disabled>Selecione a prioridade</option>
        <option value="Alta" {{ old('prioridade', $tarefa->prioridade) == 'Alta' ? 'selected' : '' }}>Alta</option>
        <option value="Média" {{ old('prioridade', $tarefa->prioridade) == 'Média' ? 'selected' : '' }}>Média</option>
        <option value="Baixa" {{ old('prioridade', $tarefa->prioridade) == 'Baixa' ? 'selected' : '' }}>Baixa</option>
    </select>
</div>
     </div>
  </div>
</div>
  </div>

  <div class="form-group mb-3">
    <label class="form-label">Data:</label>
    <input type="date" class="form-control" name="deadline" id="deadline"
        value="{{ old('deadline', $tarefa->deadline ? $tarefa->deadline : '') }}" required>
</div>
<div>

  <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Cancelar</a>
</div>
</form>
</div>

@endsection


