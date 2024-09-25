@extends('nutricionist.layout.master')

@section('content')
<div class="container mt-5">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3>Listagem de Anamneses </h3>

        <!-- Botão para criar nova antropometria -->
        <a href="{{ route('nutricionist.anamnese.create') }}" class="btn btn-success"> Nova Anamnese</a>
    </div>
    <div class="row">
        @foreach($anamneseList as $anamnese)
            <div class="col-md-4">
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Paciente: {{ $anamnese->patient->name }}</h5>
                        <p class="card-text">Data: {{ $anamnese->anamnese_date }}</p>
                        <p class="card-text">Nutricionista: {{ $anamnese->nutricionist->name }}</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('nutricionist.anamnese.edit', $anamnese->id) }}" class="btn btn-primary mx-1 btn-custom">Editar</a>
                            <a href="{{ route('nutricionist.anamnese.delete', $anamnese->id) }}" class="btn btn-danger mx-1 btn-custom" data-method="DELETE" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $anamnese->id }}').submit();">Excluir</a>
                            <form id="delete-form-{{ $anamnese->id }}" action="{{ route('nutricionist.anamnese.delete', $anamnese->id) }}" method="POST" style="display:none;">
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
a
