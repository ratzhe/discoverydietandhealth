@extends('patient.layout.master')

@section('content')
<div class="container mt-5">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3>Minhas antropometrias</h3>
    </div>

    @if($antropometriaList->isEmpty())
        <p class="text-center">Nenhuma antropometria encontrada.</p>
    @else
        <div class="row">
            @foreach($antropometriaList as $antropometria)
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Paciente: {{ $antropometria->patient->name }}</h5>
                            <p class="card-text">Data: {{ $antropometria->antropometria_date }}</p>
                            <p class="card-text">Nutricionista: {{ $antropometria->nutricionist->name }}</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('patient.antropometria.view', $antropometria->id) }}" class="btn btn-primary mx-1 btn-custom">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
