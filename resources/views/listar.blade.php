@extends('layout')

@section('content')
<div id="search-container" class="row mb-2">
    <div class="col-md-18">
      <div class="row g-2 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #edeff0;">Listagem de tarefas Tarefas</strong>

<form method="GET" action="{{ route('tarefas.index') }}">
     @csrf
      <label  for="" class=" form-label">Número: </label>
    <input class="col-md-1 col-sm-12 " type="text" name="id" placeholder="Número" value="{{ request('id') }}"><br><br>
     <label  for="" class=" form-label">Título/Descrção: </label>
    <input class="col-md-12 col-sm-12  " type="text" name="titulo" placeholder="Título" value="{{ request('titulo') }}">

   <br><br>

   <label  for="" class=" form-label">Responsável: </label>
      <select name="responsavel" >
        <option value="">Todos os Responsáveis</option>
        <option value="Dath Vader" {{ request('responsavel') == 'Dath Vader' ? 'selected' : '' }}>Dath Vader</option>
        <option value="Luck Skywalker" {{ request('responsavel') == 'Luck Skywalker' ? 'selected' : '' }}>Luck Skywalker</option>
        <option value="Leia Organa" {{ request('responsavel') == 'Leia Organa' ? 'selected' : '' }}>Leia Organa</option>
        <option value="Han Solo" {{ request('responsavel') == 'Han Solo' ? 'selected' : '' }}>Han Solo</option>
        <option value="Yoda" {{ request('responsavel') == 'Yoda' ? 'selected' : '' }}>Yoda</option>
    </select>

     <label  for="" class=" form-label">Situações: </label>
    <select name="situacao" class=”row g-5″>
        <option value="">Todas as Situações</option>
        <option value="Pendente" {{ request('situacao') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
        <option value="Em Andamento" {{ request('situacao') == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
        <option value="Concluído" {{ request('situacao') == 'Concluído' ? 'selected' : '' }}>Concluído</option>
    </select>

    <button type="submit">Buscar Tarefas</button>
</form>

</div>
</div>
</div>

<!-- Tabela de Tarefas -->
<table class="table table-hover" vertical-align: middle;>
    <thead>
        <tr>
            <th>Número</th>
            <th>Título</th>
            <th>Responsável</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tarefas as $tarefa)
        <tr>
            <td>{{ $tarefa->id }}</td>
            <td>{{ $tarefa->titulo }}</td>
            <td>{{ $tarefa->responsavel }}</td>
            <td><a class="btn btn-info edit-btn" href="{{ route('tarefas.edit', $tarefa->id) }}"><ion-icon name="create-outline">Editar</a> </td>
               <td <form action="{{$tarefa->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline">Excluir</button> </td>
<td><a class="btn btn-secondary" href="{{ route('tarefas.edit', $tarefa->id) }}"><ion-icon name="create-outline">Concluir</a>
                </td>

        </tr>
        @endforeach
    </tbody>
</table>

{{ $tarefas->links() }}

@endsection






{{--
<ul>
    @foreach ($tarefas as $tarefa)
    <li>{{$tarefa->titulo}} | <a href="">Editar</a>  | <a href="">Deletar</a> </li>

    @endforeach
</ul> --}}
