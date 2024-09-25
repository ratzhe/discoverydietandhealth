@extends('nutricionist.layout.master')

@section('content')
<div class="container mt-5">
    <br>

    <!-- Título e botão com espaçamento -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3>Listagem de Antropometrias</h3>

        <!-- Botão para criar nova antropometria -->
        <a href="{{ route('nutricionist.antropometria.create') }}" class="btn btn-success"> Nova Antropometria</a>
    </div>

    <!-- Espaçamento adicional entre o título/botão e os cards -->
    <div class="row mt-5">
        @foreach($antropometriaList as $antropometria)
            <div class="col-md-4">
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Paciente: {{ $antropometria->patient->name }}</h5>
                        <p class="card-text">Data: {{ $antropometria->antropometria_date}} </p>
                        <p class="card-text">Nutricionista: {{ $antropometria->nutricionist->name }}</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('nutricionist.antropometria.edit', $antropometria->id) }}" class="btn btn-primary mx-1 btn-custom">Editar</a>
                            <a href="{{ route('nutricionist.antropometria.delete', $antropometria->id) }}" class="btn btn-danger mx-1 btn-custom" data-method="DELETE" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $antropometria->id }}').submit();">Excluir</a>
                            <form id="delete-form-{{ $antropometria->id }}" action="{{ route('nutricionist.antropometria.delete', $antropometria->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
