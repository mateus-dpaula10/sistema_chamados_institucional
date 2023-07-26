@extends('main')

@section('title', 'Criar Chamado')

@section('content')

    @if(session('msg'))
        <p class="msg bg-success-subtle p-3 w-25 rounded">{{ session('msg') }}</p>
    @endif
    
    <div class="card" id="show_chamados">
        <div class="card-header">
            <h5 class="mb-0">Chamado ID: {{ $chamado->id }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('chamados.update', ['id' => $chamado->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input class="form-control" type="hidden" id="email_analista" name="email_analista" value="{{ auth()->user()->email }}">

                    <div class="form-group col-md-6 col-lg-3">
                        <label for="solicitante" class="form-label">Solicitante:</label>
                        <input class="form-control" type="text" id="solicitante" name="solicitante" value="{{ $chamado->solicitante }}" readonly>
                    </div>
                    <div class="form-group col-md-6 col-lg-3 mt-3 mt-md-0">
                        <label for="analista" class="form-label">Analista:</label>
                        <input class="form-control" type="text" id="analista" name="analista" value="{{ auth()->user()->nome }}" readonly>
                    </div>
                    <div class="form-group col-md-6 col-lg-2 mt-3 mt-lg-0">
                        <label for="created_at" class="form-label">Criado em:</label>
                        <input class="form-control" type="text" id="created_at" name="created_at" value="{{ date('d/m/Y'), strtotime($chamado->created_at) }}" readonly>
                    </div>
                    <div class="form-group col-md-6 col-lg-2 mt-3 mt-lg-0">
                        <label for="previsao_entrega" class="form-label">Previsão entrega:</label>
                        <input class="form-control" type="text" id="previsao_entrega" name="previsao_entrega" value="{{ date('d/m/Y'), strtotime($chamado->previsao_entrega) }}" readonly>
                    </div>
                    <div class="form-group col-md-6 col-lg-2 mt-3 mt-lg-0">
                        <label for="formFile" class="form-label">Anexo:</label>
                        <br>
                        <a id="visualizar_anexo" href="{{ asset('img_chamados/' . $chamado->formFile) }}" class="btn btn-primary w-100"><i class="fa-solid fa-paperclip me-2"></i>Visualizar anexo</a>
                    </div>
                    <div class="form-group col-md-6 col-lg-3 mt-3">
                        <label for="prioridade" class="form-label">Prioridade:</label>                        
                        <select name="prioridade" id="prioridade" class="form-select">
                            <option {{ $chamado->prioridade == '' ? 'selected' : '' }} value="" selected>Selecione</option>
                            <option {{ $chamado->prioridade == 'Baixa' ? 'selected' : '' }} value="Baixa">Baixa</option>
                            <option {{ $chamado->prioridade == 'Média' ? 'selected' : '' }} value="Média">Média</option>
                            <option {{ $chamado->prioridade == 'Alta' ? 'selected' : '' }} value="Alta">Alta</option>
                        </select>
                    </div>     
                    <div class="form-group col-md-6 col-lg-3 mt-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-select">
                            <option {{ $chamado->status == 'Aguardando' ? 'selected' : '' }} value="Aguardando" selected>Aguardando</option>
                            <option {{ $chamado->status == 'Em atendimento' ? 'selected' : '' }} value="Em atendimento">Em atendimento</option>
                            <option {{ $chamado->status == 'Finalizado' ? 'selected' : '' }} value="Finalizado">Finalizado</option>                            
                        </select>
                    </div>
                    <div class="form-group col-l2 mt-3">
                        <label for="descricao" class="form-label">Descrição do chamado:</label>
                        <textarea rows="5" class="form-control" type="text" id="descricao" name="descricao" placeholder="{{ $chamado->descricao }}" readonly></textarea>
                    </div>
                    <div class="form-group col-l2 mt-3">
                        <label for="andamento" class="form-label">Andamento do chamado:</label>
                        <textarea rows="5" class="form-control" type="text" id="andamento" name="andamento">{{ $chamado->andamento }}</textarea>
                    </div>
                    <div class="form-group col-l2 mt-3">
                        <label for="resolucao" class="form-label">Resolução do chamado:</label>
                        <textarea rows="5" class="form-control" type="text" id="resolucao" name="resolucao">{{ $chamado->resolucao }}</textarea>
                    </div>
                    <div class="form-group col-12 mt-3 text-end">                        
                        <input type="submit" class="btn btn-success" value="Salvar alterações">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_anexo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img">
                        <img src="" class="img-fluid">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-primary" download>Baixar anexo</a>
                </div>
            </div>
        </div>
    </div>    

@endsection