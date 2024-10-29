@extends('patient.layout.master')

@section('title', 'Minhas Anamneses')

@section('content')
<div class="container mt-5">

    @if($anamneses->isEmpty())
        <p>Você ainda não possui anamneses cadastradas.</p>
    @else
        @foreach ($anamneses as $anamnese)
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('Visualizar Anamnese') }}</h4>
                        </div>

                        <div class="card-body">
                            <!-- Exibição dos dados da anamnese -->
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="anamnese_date">Data</label>
                                    <input type="text" id="anamnese_date" class="form-control" value="{{ $anamnese->anamnese_date }}" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="weight">Peso</label>
                                    <input type="text" id="weight" class="form-control" value="{{ $anamnese->weight }} kg" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="height">Altura</label>
                                    <input type="text" id="height" class="form-control" value="{{ $anamnese->height }} cm" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="diseases">Doenças</label>
                                    <input type="text" id="diseases" class="form-control" value="{{ $anamnese->diseases }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="allergies">Alergias</label>
                                    <input type="text" id="allergies" class="form-control" value="{{ $anamnese->allergies }}" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="medications">Medicamentos</label>
                                    <input type="text" id="medications" class="form-control" value="{{ $anamnese->medications }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="family_history">Histórico Familiar</label>
                                    <input type="text" id="family_history" class="form-control" value="{{ $anamnese->family_history }}" readonly>
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="meals_per_day">Número de refeições diárias</label>
                                    <input type="text" id="meals_per_day" class="form-control" value="{{ $anamnese->meals_per_day }}" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="water_intake">Consumo de água diário (litros)</label>
                                    <input type="text" id="water_intake" class="form-control" value="{{ $anamnese->water_intake }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="alcohol">Consumo de bebidas alcoólicas</label>
                                    <input type="text" id="alcohol" class="form-control" value="{{ $anamnese->alcohol }}" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="caffeine">Consumo de cafeína</label>
                                    <input type="text" id="caffeine" class="form-control" value="{{ $anamnese->caffeine }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exercise">Pratica atividade física?</label>
                                    <input type="text" id="exercise" class="form-control" value="{{ $anamnese->exercise }}" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="exercise_frequency">Frequência semanal</label>
                                    <input type="text" id="exercise_frequency" class="form-control" value="{{ $anamnese->exercise_frequency }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="snacks">Pratica atividade física?</label>
                                    <input type="text" id="snacks" class="form-control" value="{{ $anamnese->snacks }}" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="diet_history">Relato de dietas anteriores</label>
                                    <input type="text" id="diet_history" class="form-control" value="{{ $anamnese->diet_history }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="short_term_goal">Objetivos de Curto Prazo</label>
                                    <input type="text" id="short_term_goal" class="form-control" value="{{ $anamnese->short_term_goal }}" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="long_term_goal">Objetivos de Longo Prazo</label>
                                    <input type="text" id="long_term_goal" class="form-control" value="{{ $anamnese->long_term_goal }}" readonly>
                                </div>
                            </div>

                            <!-- Botão para baixar em PDF -->
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="{{ route('patient.anamnese.download', $anamnese->id) }}" class="btn btn-success">Baixar em PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    @endif
</div>
@endsection
