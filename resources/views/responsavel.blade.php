@extends('layout')

@section('content')
<div class="row mb-2">
    <div class="col-md-18">
      <div class="row g-2 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #edeff0;">Cadastrar Tarefas</strong>

<form class="row g-3" action="{{route('responsavel.store')}}" method="post">
    @csrf
  <div class="mb-3">
    <label  for="" class=" form-label">Nome: </label>
    <input class="form-control " type="text" id="responsavel" name="responsavel" placeholder="Responsável pela tarefa" require>
  </div>


  <button type="submit" class="btn btn-success">Cadastrar</button>
</div>
</form>
</div>

@endsection


