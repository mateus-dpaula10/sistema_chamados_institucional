@extends('main')

@section('title', 'Meus chamados')

@section('content')

    <div class="card" id="show_chamados">
        <div class="card-header">
            <h5 class="mb-0">Meus chamados</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Analista</th>
                            <th scope="col">Descrição do chamado</th>
                            <th scope="col">Andamento do chamado</th>
                            <th scope="col">Resolução do chamado</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ( $chamados as $chamado )
                            <tr>
                                <th scope="row">{{ $chamado->id }}</th>
                                <td>{{ $chamado->analista }}</td>
                                <td>{{ $chamado->descricao }}</td>
                                <td>{{ $chamado->andamento }}</td>
                                <td>{{ $chamado->resolucao }}</td>
                                <td>{{ $chamado->status }}</td>
                                <td onclick="verDetalheChamado({{$chamado}})" title="Ver detalhes do chamado">
                                    <i class="fa-solid fa-eye bg-success p-2 text-white rounded-1"
                                    style="font-size: .75rem; cursor: pointer"></i>
                                </td>
                            </tr>
                        @endforeach

                        <div class="modal fade" id="modal_detalhes_chamados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalhes do chamado</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-xl-3">
                                                <label for="modal_analista" class="form-label">Analista</label>
                                                <input id="modal_analista" type="text" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6 col-xl-3 mt-2 mt-sm-0">
                                                <label for="modal_email_analista" class="form-label">Email analista</label>
                                                <input id="modal_email_analista" type="text" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6 col-xl-3 mt-2 mt-xl-0">
                                                <label for="modal_prioridade" class="form-label">Prioridade</label>
                                                <input id="modal_prioridade" type="text" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6 col-xl-3 mt-2 mt-xl-0">
                                                <label for="modal_status" class="form-label">Status</label>
                                                <input id="modal_status" type="text" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-12 mt-2">
                                                <label for="modal_descricao" class="form-label">Descrição</label>
                                                <textarea id="modal_descricao" rows="4" class="form-control" readonly></textarea>
                                            </div>
                                            <div class="form-group col-12 mt-2">
                                                <label for="modal_andamento" class="form-label">Andamento</label>
                                                <textarea id="modal_andamento" rows="4" class="form-control" readonly></textarea>
                                            </div>
                                            <div class="form-group col-12 mt-2">
                                                <label for="modal_resolucao" class="form-label">Resolução</label>
                                                <textarea id="modal_resolucao" rows="4" class="form-control" readonly></textarea>
                                            </div>
                                            <div class="form-group col-12 mt-2">
                                                <label for="modal_anexo" class="form-label">Anexo</label> <br>
                                                <img src="" alt="Modal anexo" id="modal_anexo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
