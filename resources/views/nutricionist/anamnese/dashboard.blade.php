@extends('nutricionist.layout.master')

@section('content')
<div class="container mt-5">
    <h4>Listagem de Anamneses</h4>
    <div class="row">
        @foreach($anamneseList as $anamnese)
            <div class="col-md-4">
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $anamnese->patient->name }}</h5>
                        <p class="card-text">Email: {{ $anamnese->patient->email }}</p>
                        <p class="card-text">Altura: {{ $anamnese->height }} cm</p>
                        <p class="card-text">Peso: {{ $anamnese->weight }} kg</p>
                        <p class="card-text">Nutricionista: {{ $anamnese->nutricionist->name }}</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('nutricionist.anamnese.edit', $anamnese->id) }}" class="btn btn-primary mx-1 btn-custom">Editar Anamnese</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
