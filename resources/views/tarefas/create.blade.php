@extends('layout')

@section('content')
    <div class="row mb-2">
        <div class="col-md-18">
            <div class="row g-2 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #edeff0;">Cadastrar
                        Tarefas</strong>

                    <form class="row g-3" action="{{route('tarefas.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class=" form-label">Título</label>
                            <input class="form-control " type="text" id="titulo" name="titulo"
                                placeholder="Título da tarefa" require>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>

                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select form-select-lg mb-1" id="responsavel" name="responsavel"
                                        aria-label="Large select example" require>
                                        <option selected>Responsável</option>
                                        <option value="Dath Vader">Dath Vader</option>
                                        <option value="Luck Skywalker">Luck Skywalker</option>
                                        <option value="Leia Organa">Leia Organa</option>
                                        <option value="Han Solo">Han Solo</option>
                                        <option value="Yoda">Yoda</option>
                                    </select><br>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <select class="form-select form-select-lg mb-3" id="prioridade"
                                                name="prioridade" aria-label="Large select example" require>
                                                <option selected>Prioridadde</option>
                                                <option value="Alta">Alta</option>
                                                <option value="Média">Média</option>
                                                <option value="Baixa">Baixa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Date: </label>
                                <input type="date" class="form-control" data-inputmask-alias="datetime" name="deadline"
                                    id="deadline" require>
                                <br<br>

                            </div>
                            <div>

                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                    </form>
                </div>

@endsection
