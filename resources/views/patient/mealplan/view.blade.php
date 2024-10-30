@extends('patient.layout.master')

@section('title', 'Visualizar Plano Alimentar')

@section('content')
<div class="container mt-5">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Visualizar Plano Alimentar') }}</h4>
            </div>
            <div class="card-body">
                <!-- Exibição dos dados do plano alimentar -->
                <div class="row">
                    <div class="form-group col-6">
                        <label for="mealplan_date">Data do Plano Alimentar</label>
                        <input type="text" id="mealplan_date" class="form-control" value="{{ $mealplan->mealplan_date }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="nutricionist">Nutricionista</label>
                        <input type="text" id="nutricionist" class="form-control" value="{{ $mealplan->nutricionist->name }}" readonly>
                    </div>
                </div>

                <!-- Exibição dos itens do plano alimentar agrupados por tipo de refeição -->
                <h6>Refeições</h6>
                <div class="row">
                    @php
                        $mealTranslations = [
                            'breakfast' => 'Café da Manhã',
                            'morning_snack' => 'Lanche da Manhã',
                            'lunch' => 'Almoço',
                            'afternoon_snack' => 'Lanche da Tarde',
                            'dinner' => 'Jantar',
                            'supper' => 'Ceia'
                        ];
                        $mealColors = [
                            'breakfast' => 'bg-warning',
                            'morning_snack' => 'bg-info',
                            'lunch' => 'bg-success',
                            'afternoon_snack' => 'bg-primary',
                            'dinner' => 'bg-danger',
                            'supper' => 'bg-secondary'
                        ];
                    @endphp
                    @foreach(['breakfast', 'morning_snack', 'lunch', 'afternoon_snack', 'dinner', 'supper'] as $mealType)
                        @php
                            $mealItems = $mealplan->foodItems->where('meal_type', $mealType);
                        @endphp
                        @if($mealItems->isNotEmpty())
                            <div class="col-md-6 mb-4">
                                <div class="card text-white {{ $mealColors[$mealType] }}">
                                    <div class="card-header">{{ $mealTranslations[$mealType] }}</div>
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            @foreach($mealItems as $index => $item)
                                                <li>{{ 'Sugestão: ' . $item->food_item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Botão para baixar em PDF (opcional) -->
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{ route('patient.mealplan.download', $mealplan->id) }}" class="btn btn-success">Baixar em PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
