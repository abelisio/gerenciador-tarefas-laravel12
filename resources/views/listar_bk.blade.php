@extends('layout')

@section('content')
<div id="search-container" class="row mb-2">
    <div class="col-md-18">
      <div class="row g-2 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #edeff0;">Listagem de tarefas Tarefas</strong>

<form action="{{route('tarefas.index')}}" method="GET">
    @csrf
  <div class="mb-3">
    <label  for="" class=" form-label">Número: </label>
    <input class="form-control " type="text" id="search" name="search" placeholder="Busca pela tarefa" require>
  </div>

  <div class="mb-3">
    <label  for="" class=" form-label">Título/Descrição: </label>
    <input class="form-control " type="text" id="responsavel" name="responsavel" placeholder="Busca pela tarefa" require>
  </div>
  <button type="submit" class="btn btn-info">Buscar Terefas</button>
</div>

<div class="col-md-4">
<select class="form-select form-select-lg mb-3" id="responsavel" name="responsavel" aria-label="Large select example" require>
  <option selected>Responsável</option>
  <option value="Dath Vader">Dath Vader</option>
  <option value="Luck Skywalker">Luck Skywalker</option>
  <option value="Leia Organa">Leia Organa</option>
  <option value="Han Solo">Han Solo</option>
  <option value="Yoda">Yoda</option>
</select>

<select class="form-select form-select-lg mb-3" id="prioridade" name="prioridade" aria-label="Large select example" require>
  <option selected>Prioridadde</option>
  <option value="Alta">Alta</option>
  <option value="Média">Média</option>
  <option value="Baixa">Baixa</option>
</select>
</form>
</div>
</div>
</div>

@foreach ($tarefas as $tarefa)
    <li>{{$tarefa->titulo}} | <a href="">Editar</a>  | <a href="">Deletar</a> </li><br><br>
    <li>{{$tarefa->id}} | <a href="">Editar</a>  | <a href="">Deletar</a> </li>

 @endforeach

@endsection






{{--
<ul>
    @foreach ($tarefas as $tarefa)
    <li>{{$tarefa->titulo}} | <a href="">Editar</a>  | <a href="">Deletar</a> </li>

    @endforeach
</ul> --}}
