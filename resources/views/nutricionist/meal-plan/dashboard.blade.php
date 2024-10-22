@extends('nutricionist.layout.master')

@section('content')
<div class="container mt-5">
    <br>

    <!-- Título e botão com espaçamento -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3>Listagem de Planos Alimentares</h3>

        <!-- Botão para criar novo plano alimentar -->
        <a href="{{ route('nutricionist.meal-plan.create') }}" class="btn btn-success"> Novo Plano Alimentar</a>
    </div>

    <!-- Espaçamento adicional entre o título/botão e os cards -->
    <div class="row mt-5">
        @foreach($mealPlans as $mealPlan)
            <div class="col-md-4">
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <!-- Exibindo o nome do paciente e nutricionista -->
                        <h5 class="card-title">Paciente: {{ $mealPlan->patient->name }}</h5>
                        <p class="card-text">Nutricionista: {{ $mealPlan->nutricionist->name }}</p>

                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('nutricionist.meal-plan.create', $mealPlan->id) }}" class="btn btn-primary mx-1 btn-custom">Editar</a>
                            <a href="{{ route('nutricionist.meal-plan.delete', $mealPlan->id) }}" class="btn btn-danger mx-1 btn-custom" data-method="DELETE" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $mealPlan->id }}').submit();">Excluir</a>
                            <form id="delete-form-{{ $mealPlan->id }}" action="{{ route('nutricionist.meal-plan.delete', $mealPlan->id) }}" method="POST" style="display:none;">
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
