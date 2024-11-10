@extends('admin.layout.master')

@section('content')
<div class="container mt-5">
    <br>

    <!-- Título e botão com espaçamento -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3>Planos Alimentares</h3>
    </div>

    <!-- Espaçamento adicional entre o título/botão e os cards -->
    <div class="row mt-5">
        @foreach($mealplans as $mealPlan)
            <div class="col-md-4">
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <!-- Exibindo o nome do paciente e nutricionista -->
                        <h5 class="card-title">Paciente: {{ $mealPlan->patient->name }}</h5>
                        <p class="card-text">Nutricionista: {{ $mealPlan->nutricionist->name }}</p>

                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('admin.mealplan.edit', $mealPlan->id) }}" class="btn btn-primary mx-1 btn-custom">Editar</a>
                            <a href="{{ route('admin.mealplan.delete', $mealPlan->id) }}" class="btn btn-danger mx-1 btn-custom" data-method="DELETE" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $mealPlan->id }}').submit();">Excluir</a>
                            <form id="delete-form-{{ $mealPlan->id }}" action="{{ route('admin.mealplan.delete', $mealPlan->id) }}" method="POST" style="display:none;">
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
