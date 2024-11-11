@extends('nutricionist.layout.master')

@section('content')
<div class="container mt-5">
    <h4>Informações do Paciente</h4>

    <!-- Faixa com nome e idade -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $user->name }}</h5>

                </div>
            </div>
        </div>
    </div>

    <!-- Cards de Anamnese, Avaliação Antropométrica e Plano Alimentar -->
    <div class="row">
        <!-- Card de Anamnese -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Anamnese</h5>
                    <p class="card-text">Clique para ver as informações da Anamnese</p>
                    <a href="{{ route('nutricionist.anamnese.dashboard', $user->id) }}" class="btn btn-primary">Ver Anamnese</a>
                </div>
            </div>
        </div>

        <!-- Card de Avaliação Antropométrica -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Avaliação Antropométrica</h5>
                    <p class="card-text">Clique para ver a Avaliação Antropométrica</p>
                    <a href="{{ route('nutricionist.antropometria.dashboard', $user->id) }}" class="btn btn-primary">Ver Avaliação</a>
                </div>
            </div>
        </div>

        <!-- Card de Plano Alimentar -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Plano Alimentar</h5>
                    <p class="card-text">Clique para ver o Plano Alimentar</p>
                    <a href="{{ route('nutricionist.meal-plan.dashboard', $user->id) }}" class="btn btn-primary">Ver Plano</a>
                </div>
            </div>
        </div>
    </div>

   
</div>
@endsection
