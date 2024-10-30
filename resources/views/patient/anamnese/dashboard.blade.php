@extends('patient.layout.master')

@section('content')
<div class="container mt-5">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3>Minhas Anamneses</h3>
    </div>

    @if($anamneseList->isEmpty())
        <p class="text-center">Nenhuma anamnese encontrada.</p>
    @else
        <div class="row">
            @foreach($anamneseList as $anamnese)
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Paciente: {{ $anamnese->patient->name }}</h5>
                            <p class="card-text">Data: {{ $anamnese->anamnese_date }}</p>
                            <p class="card-text">Nutricionista: {{ $anamnese->nutricionist->name }}</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('patient.anamnese.view', $anamnese->id) }}" class="btn btn-primary mx-1 btn-custom">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
