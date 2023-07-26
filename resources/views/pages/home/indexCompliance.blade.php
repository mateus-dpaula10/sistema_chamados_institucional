@extends('main')

@section('title', 'Criar chamado')

@section('content')

    <div class="card" id="chamados">
        <div class="card-header">
            <h5 class="mb-0">Chamados</h5>
        </div>

        <div class="card-body">
            @if(session('msg'))
                <p class="alert alert-success w-25 rounded">{{ session('msg') }}</p>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Analista</th>
                            <th scope="col">Atender</th>
                            <th scope="col">Data de abertura</th>
                            <th scope="col">Pioridade</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ( $chamados_compliance as $chamado )
                            <tr onclick=" location.href='{{ route('chamados.show', ['id' => $chamado->id]) }}' ">
                                <th scope="row">{{ $chamado->id }}</th>
                                <td>{{ $chamado->analista }}</td>
                                <td>{{ $chamado->solicitante }}</td>
                                <td>{{ date('d-m-Y', strtotime ($chamado->created_at) ) }}</td>
                                <td id="table_prioridade">{{ $chamado->prioridade }}</td>
                                <td>{{ $chamado->status }}</td>
                                <td>
                                    <a href="{{ route('chamados.destroy', ['id' => $chamado->id]) }}" class="bg-danger text-white rounded py-1 px-2 text-decoration-none"><i class="fa-solid fa-xmark me-1"></i>Finalizar chamado</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            $('.alert').fadeOut('fast');
        }, 3000);
    </script>

@endsection
