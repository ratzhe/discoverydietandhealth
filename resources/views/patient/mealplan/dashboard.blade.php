@extends('patient.layout.master')

@section('content')
<div class="container mt-5">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3>Meus Planos Alimentares</h3>
    </div>

    @if($mealplanList->isEmpty())
        <p class="text-center">Nenhum plano alimentar encontrado.</p>
    @else
        <div class="row">
            @foreach($mealplanList as $mealPlan)
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Nutricionista: {{ $mealPlan->nutricionist->name }}</h5>
                            <p class="card-text">Data do Plano: {{ $mealPlan->mealplan_date }}</p>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <a href="{{ route('patient.mealplan.view', $mealPlan->id) }}" class="btn btn-primary mx-1 btn-custom">Ver Plano</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
