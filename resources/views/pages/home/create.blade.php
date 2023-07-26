@extends('main')

@section('title', 'Criar Chamado')

@section('content')

    @if(session('msg'))
        <p class="alert alert-success p-3 w-25 rounded">{{ session('msg') }}</p>
    @endif
    @if(session('error'))
        <p class="alert alert-danger p-3 w-25 rounded">{{ session('error') }}</p>
    @endif

    <div class="card" id="criar_chamados">
        <div class="card-header">
            <h5 class="mb-0">Criar Chamado</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('chamados.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input class="form-control" type="hidden" id="email_solicitante" name="email_solicitante" value="{{ auth()->user()->email }}">

                    <div class="form-group col-md-6 col-lg-3">
                        <label for="solicitante" class="form-label">Solicitante:</label>
                        <input name="solicitante" id="solicitante" type="text" class="form-control" placeholder="Solicitante" value="{{ auth()->user()->nome }}" readonly>
                    </div>

                    <div class="form-group col-md-6 col-lg-3 mt-3 mt-md-0">
                        <label for="previsao_entrega" class="form-label">Previsão de entrega:</label>
                        <input name="previsao_entrega" id="previsao_entrega" type="date" class="form-control" required>
                    </div>

                    <div class="form-group col-md-6 col-lg-3 mt-3 mt-lg-0">
                        <label for="destinatario" class="form-label">Destinatário:</label>
                        <select name="destinatario" id="destinatario" class="form-select">
                            <option value="" selected>Selecione</option>
                            <option value="T.I">T.I</option>
                            <option value="Compliance">Compliance</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-lg-3 mt-3 mt-lg-0">
                        <label for="formFile" class="form-label">Inserir anexo:</label>
                        <input class="form-control" type="file" name="formFile" id="formFile">
                    </div>

                    <div class="form-group col-12 mt-3">
                        <label for="descricao" class="form-label">Descrição da solicitação:</label>
                        <textarea name="descricao" id="descricao" class="form-control" rows="10" required></textarea>
                        <div class="caracteres"></div>
                    </div>

                    <div class="form-group col-12 mt-3 text-end">
                        <button class="btn btn-success">Criar Chamado</button>
                    </div>

                    <script>
                        setTimeout(() => {
                            $('.alert').fadeOut('fast');
                        }, 3000);
                    </script>
                </div>
            </form>
        </div>
    </div>

@endsection
